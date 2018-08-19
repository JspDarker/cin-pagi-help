<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once '../../ConnectionDatabases.php';
require_once '../../model/Category.php';

// Instantiate DB & connect
$database = new ConnectionDatabases;
$db = $database->connect();

// Instantiate Category object
$category = new Category($db);

// Category query
$result = $category->read();

// Get row count
$num = $result->rowCount();

$a = 1;
for ($i = 0; $i < 10 ;$i++) {
    $a++;
    //......
    echo $a."\n";
}

// check if any category
if ($num > 0) {
    // Category array
    $category_arr = [];
    $category_arr['data'] = [];

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $category_item = array(
            'id' => $id,
            'category_name' => $category_name,
            'active' => $active,
            'department_name' => html_entity_decode($department_name),
            'depart_id' => $depart_id
        );

        // push "data"
        array_push($category_arr['data'], $category_item);
    }

    //turn to json output

    echo json_encode($category_arr, JSON_UNESCAPED_UNICODE);

} else {
    // Not found
    echo json_encode(
        array('message' => 'Not found data !')
    );

}