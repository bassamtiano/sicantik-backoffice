{{ HTML::script('assets/js/angular.min.js') }}


<script>

function test($http, $scope) {
    $scope.mooo = 'test'

    $scope.prototype_post = {};

    $scope.test = {
        ['nama' : 'bassam']
    };


    $scope.send_data = function() {

        $http({
            method: "POST",
            url: 'submit_data',
            data: $scope.prototype_post,
       }).success(function(data){

       });
    }
}

</script>


<html>

<head>
</head>

<body ng-app>

    <div ng-controller="test">

        <!-- <form ng-submit="send_data()" method="post"> -->
        <!-- <form action="submit_data" method="post"> -->
        <form target="target_post" method="post" action="{{ URL::to('prototype/submit_data') }}">

            <!-- <input type="text" ng-model="prototype_post.nama" name="nama" placeholder="nama" >
            <input type="text" ng-model="prototype_post.alamat" name="alamat" placeholder="alamat"> -->

            <input type="text" name="nama" placeholder="nama" >
            <input type="text" name="alamat" placeholder="alamat">

            <input type="submit">
        </form>

        <iframe src="#" id="target_post" name="target_frame" style="width:0; height:0; position:relative; background:#fff;"></iframe>

        <textarea id="submitDebugText1">@{{ajaxSubmitResult1 | json}}</textarea>

    </div>

</body>

</html>
