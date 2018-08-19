<?php
//require_once '../../model/Pagination.php';
//
//$pagination = new Pagination(1,20);
//
//echo $pagination->get_total_page('fs_category');
require_once '../../model/HelpPagination.php';
require_once '../../model/Pagination.php';

$pag = new Pagination;
$row_count = $pag->get_total_page('fs_product');
$offset = !empty($_GET['page'])?(($_GET['page']-1)*$limit):0;
var_dump((int)$_GET['page']);

$limit = 3;
$pag_config = [
    'baseURL'      => 'http://localhost/mom/api-dev/core/api/category/pagination.php',
    'totalRows'    => $row_count,
    'perPage'      => $limit
];
$pagination = new HelpPagination($pag_config);
//var_dump($pagination);


$product = $pag->get_pagination($_GET['page'],$limit);
var_dump($offset);
echo "<pre>";
print_r($product);
echo "</pre>";
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .pagination > b{
            color: aqua;
        }
        .pagination > a {
            text-decoration: none;
        }
    </style>
</head>
<body>

<?php
//$sort = ' id desc ';

echo "<hr>";
echo $pagination->createLinks();
?>
</body>
</html>
