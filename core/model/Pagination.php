<?php
require_once 'ConnectionDatabases.php';

class Pagination extends ConnectionDatabases
{
    private $_limit = 10;
    private $_page;
    private $_total;
    private $_table;

    /*public function __construct($page, $limit)
    {
        parent::__construct();

        $this->_limit = $limit;
        $this->_page = $page;
    }*/

    public function get_total_page($table)
    {
        $sql = sprintf("select count(1) as total from %s",$table);

        $res = $this->loadRow($sql);
        return $this->_total = (int)$res['total'];
        //return ceil($this->_total/$this->_limit);
        //var_dump($this->_total);
    }

    public function get_pagination( $page, $limit)
    {
        //$sql = "select id, `name`, price, `view` from fs_product limit :page,:perpage";
        $sql = "select id, `name`, price, `view` from fs_product limit %u,%u";
        $x = sprintf($sql,$page,$limit);
//        $options = [
//          ':sort' => $sort,
//          ':page' => $page,
//          ':perpage' => $limit
//        ];
        return $this->loadRows($x);
    }
}