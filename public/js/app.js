angular.module( 'wayneApp',
['ngRoute', 'parseModule', 'gridModule'])
.config(iniRouterProvider);

function iniRouterProvider($routeProvider, $locationProvider) {

    $routeProvider.when('/', {
        templateUrl: 'templates/home.html'
    });

    $routeProvider.when('/parsingShoopingCart', {
        templateUrl: 'templates/parsingShoopingCart.html',
        controller: 'parsingShoopingCartController'
    });

    $routeProvider.when('/gridView', {
        templateUrl: 'templates/gridView.html',
        controller: 'gridViewController'
    });

    $routeProvider.otherwise('/');
}
iniRouterProvider.$inject = ["$routeProvider", "$locationProvider"];
