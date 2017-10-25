<!DOCTYPE html>
<html ng-app="wayneApp">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="wayne">
    <title>Waynes Projects</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">WayneHome</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="#!parsingShoopingCart">Parsing Shooping Cart</a></li>
            <li><a href="#!gridView">Grid View</a></li>
        </ul>
    </nav>

    <div ng-view></div>

    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-route.js"></script>
    <script type="text/javascript" src="{{ asset('js/preload/angular.dcb-img-fallback.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/parsing/parsing_service.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/parsing/parsing_controller.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/gridview/gridview_controller.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

</body>
</html>
