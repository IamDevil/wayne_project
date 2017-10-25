(function() {
    'use strict';
    angular.module('parseModule', ['parseServiceModule'])
    .controller('parsingShoopingCartController', parsingShoopingCartInitial);

    function parsingShoopingCartInitial($scope, dataFactory) {
        $scope.item_array;
        $scope.table_show = false;
        $scope.pchome_loading = false;
        $scope.yahoo_loading = false;

        $scope.getPchomeItemList = function() {
            if(!$scope.table_loading && $scope.keyword) {
                $scope.pchome_loading = true;
                getItemList('/parsing/pchome');
            }
        };

        $scope.getYahooItemList = function() {
            if(!$scope.table_loading && $scope.keyword) {
                $scope.yahoo_loading = true;
                getItemList('/parsing/yahoo');
            }
        };

        function getItemList(WebBase) {
            $scope.table_show = false;

            dataFactory.getItemList(WebBase, $scope.keyword)
            .then(function (response) {
                $scope.pchome_loading = false;
                $scope.yahoo_loading = false;
                $scope.table_show = true;
                $scope.item_array = response.data.data;
            }, function (error) {
                $scope.table_show = false;
                console.log('Unable to load customer data: ' + error.message);
            });
        };

    }
    parsingShoopingCartInitial.$inject = ["$scope", "dataFactory"];
})();
