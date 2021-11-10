<?php

include "database.php";

class Product
{
    private $id;
    private $name;
    private $price;

    function __construct($id)
    {
        global $connection;
        $query = "SELECT * FROM product WHERE id = " . $id;
        // $query .= "WHERE id =" . $id;
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query failed " . mysqli_error($connection));
        }

        $row = mysqli_fetch_assoc($result);

        $this->id= $row["id"];
        $this->name = $row["name"];
        $this->price = $row["price"];
    }

    public function getName()
    {
        return $this->name;
        // $this->query = "SELECT "
    }

    public function getPrice()
    {
        return $this->price;
    }
}
