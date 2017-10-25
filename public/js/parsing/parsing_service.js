(function() {
    'use strict';
    angular.module('parseServiceModule', [])
    .factory('dataFactory', dataFactoryInit);

    function dataFactoryInit($http) {
        const URLBASE = '/api';
        let dataFactory = {};

        dataFactory.getItemList = function (web, keyword) {
            const DATA = {
    				name : keyword
    		};

            return $http.post(URLBASE + web, DATA);
        };

        return dataFactory;
    }
    dataFactoryInit.$inject = ["$http"];
})();
