<?php

include "database.php";

class Product
{
    private $id;
    private $name;
    private $price;

    function __construct()
    {
        global $connection;
        $query = "SELECT * FROM product";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query failed " . mysqli_error($connection));
        }
    }

    public function getName()
    {
        $this->name;
        // $this->query = "SELECT "
        global $connection;
        $productName = $this->query = "SELECT * FROM product";
        return $result = mysqli_query($connection, $productName);
    }

    public function getPrice()
    {
        $this->price;
    }
}
