<?php

/**
 * Description of CuentaBancariaDao
 *
 * @author PixelZer0
 */

class CuentaBancariaDao implements DaoTableInterface, DaoViewInterface {
    
    // CONSTRUCTOR

    public function construct() {
        
    }

    // MÉTODOS

    /**
     * Método get: Devuelve un registro de cuentabancaria en función del id
     *
     * @param [type] $array
     * @return array
     */
    public function get($array) {
        $connection = new ConnectionHelper();
        if ($connection->checkDBConnection()) {
            try {
                $sqlMaker = $connection->getConnection();
                $aTest = NULL;
                $preparedStatement = $sqlMaker->prepare("SELECT * FROM cuentabancaria WHERE 1=1 AND id=?");
                $preparedStatement->bind_param('i', $array['id']);
                $preparedStatement->execute();
                $preparedStatement->store_result();
                $rows = $preparedStatement->num_rows;
                if ($rows > 0) {                    
                    $meta = $preparedStatement->result_metadata();
                    while ($field = $meta->fetch_field()) {
                        $params[] = &$row[$field->name];
                    }
                    call_user_func_array(array($preparedStatement, 'bind_result'), $params);
                    while ($preparedStatement->fetch()) {
                        foreach ($row as $key => $val) {
                            $c[$key] = $val;
                        }
                        $aTest = $c;
                    }
                    $keyToRemove = array_search("pass", $aTest);
                    unset($aTest[$keyToRemove]);
                    $aResult = $aTest;
                } else {
                    throw new Exception();
                }
            } catch (Exception $ex) {
                throw new Exception($ex->getMessage());
            } finally {
                if ($preparedStatement !== NULL) {
                    $preparedStatement->close();
                }
            }
        }
        return $aResult;
    }

    /**
     * Método set: Crea u/o modifica una cuentabancaria en función de un id
     *
     * @param [type] $array
     * @return array
     */
    public function set($array) {
        $connection = new ConnectionHelper();
        if ($connection->checkDBConnection()) {
            try {
                $insert = TRUE;
                $sqlMaker = $connection->getConnection();
                if ($array['id'] == NULL) {
                    $preparedStatement = $sqlMaker->prepare("INSERT INTO cuentabancaria" .
                            "(iban, banco_id) VALUES(?, ?)");
                    $preparedStatement->bind_param('si', $array['iban'], $array['banco_id']);
                    $preparedStatement->execute();
                    $preparedStatement->store_result();
                } else {
                    $insert = FALSE;
                    $preparedStatement = $sqlMaker->prepare("UPDATE cuentabancaria SET " .
                            "iban=?, banco_id=? WHERE id=?");
                    $preparedStatement->bind_param('sii', $array['iban'], $array['banco_id'], 
                            $array['id']);
                    $preparedStatement->execute();
                    $preparedStatement->store_result();
                    $rows = $preparedStatement->num_rows;
                }
                if ($rows < 0) {
                    throw new Exception();
                }
                if ($insert) {
                    $iResult = $sqlMaker->insert_id;
                    $aResult = ["id" => $iResult];
                }
            } catch (Exception $ex) {
                throw new Exception($ex->getMessage());
            } finally {
                if ($preparedStatement !== NULL) {
                    $preparedStatement->close();
                }
            }
        } else {
            throw new Exception();
        }
        return $aResult;
    }

    /**
     * Método remove: Elimina una cuentabancaria en función de un id
     *
     * @param [type] $array
     * @return array
     */
    public function remove($array) {
        $connection = new ConnectionHelper();
        if ($connection->checkDBConnection()) {
            try {
                $sqlMaker = $connection->getConnection();
                $preparedStatement = $sqlMaker->prepare("DELETE FROM cuentabancaria WHERE id=?");
                $preparedStatement->bind_param('i', $array['id']);
                $preparedStatement->execute();
                $preparedStatement->store_result();
                $rows = $preparedStatement->num_rows;
                if ($rows > 0) {
                    $aResult = ["id" => $array['id']];
                } else {
                    throw new Exception();
                }
            } catch (Exception $ex) {
                throw new Exception($ex->getMessage());
            } finally {
                if ($preparedStatement !== NULL) {
                    $preparedStatement->close();
                }
            }
        } else {
            throw new Exception();
        }
        return $aResult;
    }

    /**
     * Método getCount: Obtiene el número total de registros en la tabla cuentabancaria
     *
     * @return array
     */
    public function getCount() {
        $connection = new ConnectionHelper();
        if ($connection->checkDBConnection()) {
            try {
                $sqlMaker = $connection->getConnection();
                $statement = $sqlMaker->query("SELECT COUNT(*) as rows FROM cuentabancaria WHERE 1=1");
                $rows = $statement->num_rows;
                if ($rows > 0) {
                    $aResult = $statement->fetch_assoc();
                }
            } catch (Exception $ex) {
                throw new Exception($ex->getMessage());
            } finally {
                if ($statement !== NULL) {
                    $statement->close();
                }
            }
        } else {
            throw new Exception();
        }
        return $aResult;
    }

    /**
     * Método getPage: Devuelve registros en función de unos limites
     *
     * @param [type] $array
     * @return array
     */
    public function getPage($array) {
        $connection = new ConnectionHelper();
        if ($connection->checkDBConnection()) {
            try {
                $aResponse = [];
                $sqlHelper = new SQLHelper();
                $total = $this->getCount();
                $sqlMaker = $connection->getConnection();
                $sqlFilter = $this->thisSqlFilter($array['filter']);
                // $sqlLimit = $sqlHelper->buildSqlLimit($total, $array['np'], $array['rpp']);
                $preparedStatement = $sqlMaker->prepare("SELECT * FROM cuentabancaria " . 
                        "WHERE 1=? AND id" . $sqlFilter);
                $preparedStatement->bind_param('i', $a = 1);
                $preparedStatement->execute();
                $preparedStatement->store_result();
                $rows = $preparedStatement->num_rows;
                if ($rows > 0) {
                    $meta = $preparedStatement->result_metadata();
                    while ($field = $meta->fetch_field()) {
                        $params[] = &$row[$field->name];
                    }
                    call_user_func_array(array($preparedStatement, 'bind_result'), $params);
                    while ($preparedStatement->fetch()) {
                        foreach ($row as $key => $val) {
                            $c[$key] = $val;
                        }
                        $aTest = $c;
                        array_push($aResponse, $aTest);
                    }
                } else {
                    throw new Exception();
                }
            } catch (Exception $ex) {
                throw new Exception($ex->getMessage());
            } finally {
                if ($preparedStatement !== NULL) {
                    $preparedStatement->close();
                }
            }
        } else {
            throw new Exception();
        }
        return $aResponse;
    }

    /**
     * Método thisSqlFilter: Aplica una subconsulta a modo de filtro
     *
     * @param [type] $filter
     * @return array
     */
    public function thisSqlFilter($filter) {
        $sqlFilter = "";
        if ($filter != NULL) {
            $sqlFilter = " IN (SELECT cb.id FROM usuario u, cuentabancaria cb, cuentaasociada ca " .
            "WHERE u.id = ca.usuario_id " . 
            "AND cb.id = ca.cuentabancaria_id " . 
            "AND u.id = " . $filter['id_1'];
            if (array_key_exists("id_2", $filter)) {
                $sqlFilter = $sqlFilter . " AND cb.banco_id = " . $filter['id_2'] . ")";
            } else {
                $sqlFilter = $sqlFilter . ")";
            }
        } else {
            $sqlFilter = NULL;
        }
        return $sqlFilter;
    }
    
}
