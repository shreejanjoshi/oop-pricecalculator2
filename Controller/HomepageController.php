<?php

declare(strict_types=1);

include "Model/database.php";

class HomepageController
{
    // private $customers = [];

    //render function with both $_GET and $_POST vars available if it would be needed.
    function __construct()
    {
        $this->fetchCustomers();
        $this->fetchProducts();
    }

    public function render(array $GET, array $POST)
    {

        require 'View/homepage.php';
    }

    public function fetchCustomers()
    {
        // global $connection;
        // $query = "SELECT * FROM customer";
        // $result = mysqli_query($connection, $query);
        // if (!$result) {
        //     die("Query failed " . mysqli_error($connection));
        // }

        // $this->customers = mysqli_fetch_assoc($result);
        // var_dump($result);

        $this->firstname;
        global $connection;
        $firstname = "SELECT * FROM customer";
        return $result = mysqli_query($connection, $firstname);
        if (!$result) {
            die("Query failed " . mysqli_error($connection));
        }
    }

    private function fetchProducts()
    {
        global $connection;
        $query = "SELECT * FROM product";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("Query failed " . mysqli_error($connection));
        }

        return $row = mysqli_fetch_row($result);
    }

    private function fetchGroup()
    {
        global $connection;
        $query = "SELECT * FROM customer_group";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("Query failed " . mysqli_error($connection));
        }

        return $row = mysqli_fetch_row($result);
    }

    // public function getCustomers()
    // {
    //     return $this->customers;
    // }
}
