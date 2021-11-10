<?php

declare(strict_types=1);

include "Model/database.php";
require 'Model/Customer.php';
require 'Model/CustomerGroup.php';
require 'Model/Product.php';

class HomepageController
{
    private $customers = [];
    private $products = [];
    private $customer;
    private $group;
    private $product;

    //render function with both $_GET and $_POST vars available if it would be needed.
    function __construct()
    {
        $this->fetchCustomers();
        $this->fetchProducts();
        if (isset($_POST) && !empty($_POST)) {
            $this->calculate();
        }
    }

    private function calculate()
    {
        $this->customer = new Customer($_POST['name']);
        //__________________________________________________________________
        $customerGroupId = $this->customer->getGroupId();
        $customerFixedDiscount =  $this->customer->getFixedDiscount();
        $customerVariableDiscount =  $this->customer->getVariableDiscount();

        $this->product = new Product($_POST['product']);
        //__________________________________________________________________
        $cost = $this->product->getPrice();

        $this->group = new CustomerGroup($customerGroupId);
        //____________________________________________________________________
        $groupParentId = $this->group->getParentId();
        $groupFixedDiscount = $this->group->getFixedDiscount();
        $groupVariableDiscount =  $this->customer->getVariableDiscount();

        $totalFixedDiscount = 0;
        $totalVariableDiscount = 0;

        while($groupParentId != "NULL"){
            $totalFixedDiscount += $groupFixedDiscount;
            $groupFixedDiscount = $this->group->getFixedDiscount();
            if($groupFixedDiscount == "NULL"){
                $groupFixedDiscount = 0;
            }
            $groupVariableDiscount =  $this->customer->getVariableDiscount();
            if($groupVariableDiscount == "NULL"){
                $groupVariableDiscount = 0;
            }
        }
    }

    public function render(array $GET, array $POST)
    {

        require 'View/homepage.php';
    }

    private function fetchCustomers()
    {
        global $connection;
        $query = "SELECT * FROM customer";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("Query failed " . mysqli_error($connection));
        }

        $this->customers = $result;
    }

    private function fetchProducts()
    {
        global $connection;
        $query = "SELECT * FROM product";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("Query failed " . mysqli_error($connection));
        }

        $this->products = $result;
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

    public function getCustomers()
    {
        return $this->customers;
    }

    public function getProducts()
    {
        return $this->products;
    }

    public function getCalc()
    {
        return $this->customer;
    }
}
