{{ HTML::script('assets/js/angular.min.js') }}
{{ HTML::script('assets/js/jquery.min.js') }}


<script>

// function test($http, $scope) {
//     $scope.mooo = 'test'
//
//     $scope.prototype_post = {};
//
//     $scope.test = {
//         ['nama' : 'bassam']
//     };
//
//
//     $scope.send_data = function() {
//
//         $http({
//             method: "POST",
//             url: 'submit_data',
//             data: $scope.prototype_post,
//        }).success(function(data){
//
//        });
//     }
// }


function haiii(aww) {
    // var test = $('#target_post').contents().find('#result');

    // index = test.context;

    // aw = $('iframe#target_post');


    // aw = index.find('p');

    // console.log(index);
    // console.log(test);
    // console.log(test.context.all.target_post);

    // console.log(aw);

    alert(aww);
}

</script>



<html>

<head>
</head>

<body ng-app>

    <!-- <div ng-controller="test"> -->
    <div>

        <!-- <form ng-submit="send_data()" method="post"> -->
        <!-- <form action="submit_data" method="post"> -->
        <form target="target_post" method="post" action="{{ URL::to('prototype/submit_data') }}">

            <!-- <input type="text" ng-model="prototype_post.nama" name="nama" placeholder="nama" >
            <input type="text" ng-model="prototype_post.alamat" name="alamat" placeholder="alamat"> -->

            <input type="text" name="nama" placeholder="nama" >
            <input type="text" name="alamat" placeholder="alamat">

            <!-- <input type="submit" onclick="haiii()"> -->
            <input type="submit">
        </form>

        <iframe id="target_post" name="target_post" style="width:100; height:100; position:relative; background:#fff;"></iframe>

    </div>

</body>

</html>
