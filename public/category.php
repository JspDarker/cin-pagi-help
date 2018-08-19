<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>@_JSpark</title>
</head>
<body>

<div class="container this-ajax">
    <h4>this is title</h4>
    <ul>

    </ul>

</div>

<script src="js/jquery-3.3.1.js"></script>
<script src="js/bootstrap.js"></script>

<script>
    $(function(){
        var jqxhr = $.ajax({
            url: '../core/api/category/read.php',
            data: {},
            type: 'GET',
            success: function (data) {
                // When AJAX call is successfuly

                //console.log( data.data[0].department_name);
                $.each(data.data,function(key,value) {

                    $('h4').text(value.department_name);
                    $('ul').append("<li>"+value.category_name+"</li>");
                });
                console.log('AJAX call successful.');
                console.log(data);
            }
        })
    });
</script>
</body>
</html>