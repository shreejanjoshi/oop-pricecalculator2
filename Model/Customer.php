<?php

require "database.php";

class Customer
{
    private $id;
    private $firstname;
    private $lastname;
    private $groupId;
    private $fixedDisdount;
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

        $this->id = $row["id"];
        $this->firstname = $row["firstname"];
        $this->lastname = $row["lastname"];
        $this->groupId = $row["group_id"];
        $this->fixedDisdount = $row["fixed_discount"];
        $this->variableDiscount = $row["variable_discount"];
    }

    // public function getId()
    // {
    //     $this->id;
    //     global $connection;
    //     $firstname = $this->query = "SELECT firstname FROM customer";
    //     return $result = mysqli_query($connection, $firstname);
    // }

    public function getFirstname()
    {
        return $this->firstname;
        // global $connection;
        // $firstname = $this->query = "SELECT * FROM customer";
        // return $result = mysqli_query($connection, $firstname);
    }

    public function getLastname()
    {
        return $this->lastname;
        // global $connection;
        // $lastname = $this->query = "SELECT lastname FROM customer";
        // return $result = mysqli_query($connection, $lastname);
    }

    public function getGroupId()
    {
        return $this->groupId;
        // global $connection;
        // $lastname = $this->query = "SELECT lastname FROM customer";
        // return $result = mysqli_query($connection, $lastname);
    }

    public function getFixedDiscount()
    {
        return $this->fixedDiscount;
        // global $connection;
        // $fixedDiscount = $this->query = "SELECT fixed_discount FROM customer";
        // return $result = mysqli_query($connection, $fixedDiscount);
    }

    public function getVariableDiscount()
    {
        return $this->variableDiscount;
        // global $connection;
        // $variableDiscount = $this->query = "SELECT variable_discount FROM customer";
        // return $result = mysqli_query($connection, $variableDiscount);
    }
}
