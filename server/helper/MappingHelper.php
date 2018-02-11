<?php

/**
 * Description of MappingHelper
 *
 * @author PixelZer0
 */

require 'bean/ReplyBean.php';
require 'service/UsuarioService.php';
//require 'service/TipoUsuarioService.php';
//require 'service/MovimientoService.php';
//require 'service/CuentaBancariaService.php';
//require 'service/CuentaAsociadaService.php';
//require 'service/CategoriaMovimientoService.php';
//require 'service/BancoService.php';

class MappingHelper {
    
    public static function methodToExecute($ob, $op, $json) {
        $oReplyBean = NULL;
        switch($ob) {
            case "usuario":
                $oUsuarioService = new UsuarioService();
                switch($op) {
                    case "get":
                        $aResult = [$oUsuarioService->get($json)];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "set":
                        $aResult = [$oUsuarioService->set($json)];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "remove":
                        $aResult = [$oUsuarioService->remove($json)];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "getCount":
                        $aResult = [$oUsuarioService->getCount($json)];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "getPage":
                        $aResult = [$oUsuarioService->getPage($json)];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "login":
                        $aResult = [$oUsuarioService->login($json)];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "logout":
                        $aResult = [$oUsuarioService->logout()];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    default:
                        $aResult = [500, "Operation not found : Please contact your administrator"];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                }
                break;
            case "tipousuario":
                $oTipoUsuarioService = new TipoUsuarioService();
                switch($op) {
                    case "get":
                        $aResult = [$oTipoUsuarioService->get($json)];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "set":
                        $aResult = [$oTipoUsuarioService->set($json)];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "remove":
                        $aResult = [$oTipoUsuarioService->remove($json)];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "getCount":
                        $aResult = [$oTipoUsuarioService->getCount($json)];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "getPage":
                        $aResult = [$oTipoUsuarioService->getPage($json)];
                        $oReplyBean = new ReplyBean($aResult);
                        break;                    
                    default:
                        $aResult = [500, "Operation not found : Please contact your administrator"];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                }
                break;
            case "movimiento":
                $oMovimientoService = new MovimientoService();
                switch($op) {
                    case "get":
                        $aResult = [$oMovimientoService->get($json)];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "set":
                        $aResult = [$oMovimientoService->set($json)];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "remove":
                        $aResult = [$oMovimientoService->remove($json)];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "getCount":
                        $aResult = [$oMovimientoService->getCount($json)];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "getPage":
                        $aResult = [$oMovimientoService->getPage($json)];
                        $oReplyBean = new ReplyBean($aResult);
                        break;                    
                    default:
                        $aResult = [500, "Operation not found : Please contact your administrator"];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                }
                break;
            case "cuentabancaria":
                $oCuentaBancariaService = new CuentaBancariaService();
                switch($op) {
                    case "get":
                        $aResult = [$oCuentaBancariaService->get($json)];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "set":
                        $aResult = [$oCuentaBancariaService->set($json)];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "remove":
                        $aResult = [$oCuentaBancariaService->remove($json)];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "getCount":
                        $aResult = [$oCuentaBancariaService->getCount($json)];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "getPage":
                        $aResult = [$oCuentaBancariaService->getPage($json)];
                        $oReplyBean = new ReplyBean($aResult);
                        break;                    
                    default:
                        $aResult = [500, "Operation not found : Please contact your administrator"];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                }
                break;
            case "cuentaasociada":
                $oCuentaAsociadaService = new CuentaAsociadaService();
                switch($op) {
                    case "get":
                        $aResult = [$oCuentaAsociadaService->get($json)];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "set":
                        $aResult = [$oCuentaAsociadaService->set($json)];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "remove":
                        $aResult = [$oCuentaAsociadaService->remove($json)];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "getCount":
                        $aResult = [$oCuentaAsociadaService->getCount($json)];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "getPage":
                        $aResult = [$oCuentaAsociadaService->getPage($json)];
                        $oReplyBean = new ReplyBean($aResult);
                        break;                    
                    default:
                        $aResult = [500, "Operation not found : Please contact your administrator"];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                }
                break;
            case "categoriamovimiento":
                $oCategoriaMovimientoService = new CategoriaMovimientoService();
                switch($op) {
                    case "get":
                        $aResult = [$oCategoriaMovimientoService->get($json)];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "set":
                        $aResult = [$oCategoriaMovimientoService->set($json)];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "remove":
                        $aResult = [$oCategoriaMovimientoService->remove($json)];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "getCount":
                        $aResult = [$oCategoriaMovimientoService->getCount($json)];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "getPage":
                        $aResult = [$oCategoriaMovimientoService->getPage($json)];
                        $oReplyBean = new ReplyBean($aResult);
                        break;                    
                    default:
                        $aResult = [500, "Operation not found : Please contact your administrator"];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                }
                break;
            case "banco":
                $oBancoService = new BancoService();
                switch($op) {
                    case "get":
                        $aResult = [$oBancoService->get($json)];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "set":
                        $aResult = [$oBancoService->set($json)];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "remove":
                        $aResult = [$oBancoService->remove($json)];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "getCount":
                        $aResult = [$oBancoService->getCount($json)];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                    case "getPage":
                        $aResult = [$oBancoService->getPage($json)];
                        $oReplyBean = new ReplyBean($aResult);
                        break;                    
                    default:
                        $aResult = [500, "Operation not found : Please contact your administrator"];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
                }
                break;
            default:
                $aResult = [500, "Object not found : Please contact your administrator"];
                        $oReplyBean = new ReplyBean($aResult);
                        break;
        }
        return $oReplyBean;
    }
    
}