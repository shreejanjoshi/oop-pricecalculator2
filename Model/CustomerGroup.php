<?php

include "database.php";

class CustomerGroup{
    private $id;
    private $name;
    private $parentId;
    private $fixedDiscount;
    private $variableDiscount;

    function __construct($id)
    {
        
        global $connection;
        $query = "SELECT * FROM customer WHERE id = " . $id;
        // $query .= "WHERE id =" . $id;
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query failed " . mysqli_error($connection));
        }

        $row = mysqli_fetch_assoc($result);

        $this->id= $row[0]["id"];
        $this->name = $result[0]["name"];
        $this->parentId = $result[0]["parent_id"];
        $this->fixedDisdount = $result[0]["fixed_discount"];
        $this->variableDiscount = $result[0]["variable_discount"];
    }

    public function getName(){
        return $this->name;
        // global $connection;
        // $groupName = $this->query = "SELECT * FROM customer_group";
        // return $result = mysqli_query($connection, $groupName);
    }

    public function getParentId(){
        return $this->parentId;
    }

    public function getFixedDiscount(){
        return $this->fixedDiscount;
    }

    public function getVariableDiscount(){
        return $this->variableDiscount;
    }
}