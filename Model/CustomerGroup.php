<?php

include "database.php";

class CustomerGroup{
    private $id;
    private $name;
    private $parentId;
    private $fixedDiscount;
    private $variableDiscount;

    function __construct()
    {
        global $connection;
        $query = "SELECT * FROM customer_group";
        $result = mysqli_query($connection, $query);

        if(!$result){
            die("Query failed " . mysqli_error($connection));
        }
    }

    public function getName(){
        $this->name;
        global $connection;
        $groupName = $this->query = "SELECT * FROM customer_group";
        return $result = mysqli_query($connection, $groupName);
    }

    public function getParentId(){
        $this->parentId;
    }

    public function getFixedDiscount(){
        $this->fixedDiscount;
    }

    public function getVariableDiscount(){
        $this->variableDiscount;
    }
}