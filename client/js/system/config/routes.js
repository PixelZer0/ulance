/**
 * Rutas generales
 */

ulance.config(['$routeProvider', '$locationProvider', function ($routeProvider) {
    $routeProvider.when('/', {
        templateUrl: 'js/system/shared/login.html',
        controller: 'LoginController'
    })
    .when('/login', {
        templateUrl: 'js/system/shared/login.html',
        controller: 'LoginController'
    })
    .when('/main', {
        templateUrl: 'js/system/shared/main.html',
        controller: 'MainController'
    })
    .when('/registros', {
        templateUrl: 'js/app/movimiento/1/plist.html',
        controller: 'RegistrosController'
    })
    .when('/logout', {
        templateUrl: 'js/system/shared/logout.html',
        controller: 'LogoutController'
    })
    .when('/profile', {
        templateUrl: 'js/system/shared/profile.html',
        controller: 'ProfileController'
    })
    // .when('/usuario/1/plist/:np?/:rpp?', {
    //     templateUrl: 'js/app/usuario/1/plist.html',
    //     controller: 'Usuario1PlistController'
    // })
    .when('/cuentas', {
        templateUrl: 'js/app/cuentabancaria/1/plist.html',
        controller: 'CuentasBancariasController'
    })
    .when('/banco', {
        templateUrl: 'js/app/banco/1/plist.html',
        controller: 'BancoController'
    })
    .otherwise({
        redirectTo: '/'
    });
}]);