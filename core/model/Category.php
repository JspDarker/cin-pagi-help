<?php


class Category
{
    // DB stuff
    private $conn;
    private $table = 'fs_category';

    // Post Properties
    public $id;
    public $department_id;
    public $name;
    public $order;
    public $active;

    // Constructor with DB
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Get Category
    public function read()
    {
        $sql = 'SELECT
              c.id,
              c.name as category_name,
              c.active,
              d.name as department_name,
              d.id as depart_id
            FROM
              fs_category c
            LEFT JOIN
                fs_department d ON d.id = c.department_id
            ORDER BY
                d.id DESC 
            LIMIT 0,8       
        ';

        // Prepare statement
        $stmt = $this->conn->prepare($sql);

        // Execute query
        $stmt->execute();

        return $stmt;

    }

    public function pagination()
    {
        $sql = "select * from fs_category limit :offset,:limit";
    }

}