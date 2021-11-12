<?php

include "database.php";

class CustomerGroup
{
    private $id;
    private $name;
    private $parentId;
    private $fixedDiscount;
    private $variableDiscount;

    function __construct($id)
    {

        global $connection;
        $query = "SELECT * FROM customer_group WHERE id = " . $id;
        // $query .= "WHERE id =" . $id;
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query failed " . mysqli_error($connection));
        }

        $row = mysqli_fetch_assoc($result);
        $this->id = $row["id"];
        $this->name = $row["name"];
        $this->parentId = $row["parent_id"];
        $this->fixedDiscount = $row["fixed_discount"];
        $this->variableDiscount = $row["variable_discount"];
    }

    public function getName()
    {
        return $this->name;
        // global $connection;
        // $groupName = $this->query = "SELECT * FROM customer_group";
        // return $result = mysqli_query($connection, $groupName);
    }

    public function getParentId()
    {
        return $this->parentId;
    }

    public function getFixedDiscount()
    {
        return $this->fixedDiscount;
    }

    public function getVariableDiscount()
    {
        return $this->variableDiscount;
    }
}
