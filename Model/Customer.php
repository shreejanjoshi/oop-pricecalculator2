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

    function __construct()
    {
        global $connection;
        $query = "SELECT * FROM customer";
        // $query .= "WHERE id =" . $id;
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query failed " . mysqli_error($connection));
        }

        // $this->firstname = $result[0]["firstname"];
        // $this->lastname = $result[0]["lastname"];
        // $this->groupId = $result[0]["group_id"];
        // $this->fixedDisdount = $result[0]["fixed_discount"];
        // $this->variableDiscount = $result[0]["variable_discount"];

    }

    public function getId()
    {
        $this->id;
        global $connection;
        $firstname = $this->query = "SELECT firstname FROM customer";
        return $result = mysqli_query($connection, $firstname);
    }

    public function getFirstname()
    {
        $this->firstname;
        global $connection;
        $firstname = $this->query = "SELECT * FROM customer";
        return $result = mysqli_query($connection, $firstname);
    }

    public function getLastname()
    {
        $this->lastname;
        global $connection;
        $lastname = $this->query = "SELECT lastname FROM customer";
        return $result = mysqli_query($connection, $lastname);
    }

    public function getGroupId()
    {
        return $this->groupId;
        global $connection;
        $lastname = "SELECT lastname FROM customer";
        return $result = mysqli_query($connection, $lastname);
    }

    public function getFixedDisdount()
    {
        return $this->fixedDisdount;
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