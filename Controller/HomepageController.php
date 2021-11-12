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
    private $groupParentId;
    private $totalFixedDiscount = 0;
    private $totalVariableDiscount = 0;
    private $finalCost;
    private $totalAfterPer;


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
        //_____________________________________________
        // $customerGroupId = $this->customer->getGroupId();
        //$customerFixedDiscount =  $this->customer->getFixedDiscount();
        //$customerVariableDiscount =  $this->customer->getVariableDiscount();

        $this->product = new Product($_POST['product']);
        //_____________________________________________
        // $cost = $this->product->getPrice();

        $this->group = new CustomerGroup($this->customer->getGroupId());
        //_____________________________________________
        // $this->groupParentId = $this->group->getParentId();
        // $groupFixedDiscount = $this->group->getFixedDiscount();
        // $groupVariableDiscount =  $this->customer->getVariableDiscount();

        if ($this->customer->getVariableDiscount() == NULL) {
            $this->totalFixedDiscount += $this->customer->getFixedDiscount();
            var_dump($this->customer->getFixedDiscount());
        } else {
            if ($this->totalVariableDiscount < $this->customer->getVariableDiscount()) {
                $this->totalVariableDiscount = $this->customer->getVariableDiscount();
            }
        }

        if ($this->group->getVariableDiscount() == NULL) {
            $this->totalFixedDiscount += $this->group->getFixedDiscount();
            var_dump($this->group->getFixedDiscount());
        } else {
            if ($this->totalVariableDiscount < $this->group->getVariableDiscount()) {
                $this->totalVariableDiscount = $this->group->getVariableDiscount();
            }
        }

        $this->checkParentId($this->group);

        $this->finalCost = $this->product->getPrice() - ($this->totalFixedDiscount * 100);



        if ($this->finalCost < 0) {
            $this->finalCost = 0;
        } else {
            // $this->finalCost = (100 - $this->totalVariableDiscount) / 100 * $this->finalCost;
            $this->totalAfterPer = $this->finalCost * $this->totalVariableDiscount / 100;

            $this->finalCost = $this->finalCost - $this->totalAfterPer;
        }
        // var_dump($this->product->getPrice() - ($this->totalFixedDiscount * 100));


        // if ($this->groupParentId != "NULL") {

        //     $totalFixedDiscount -=

        //         $totalFixedDiscount = $customerFixedDiscount - $groupFixedDiscount - $newFixedDiscount;
        //     $totalVariableDiscount = max($customerVariableDiscount, $groupVariableDiscount, $newVariableDiscount);
        //     //_____________________________________________________________________
        //     // $groupFixedDiscount = $this->group->getFixedDiscount();
        //     // if($groupFixedDiscount == "NULL"){
        //     //     $groupFixedDiscount = 0;
        //     // }
        //     // $groupVariableDiscount =  $this->customer->getVariableDiscount();
        //     // if($groupVariableDiscount == "NULL"){
        //     //     $groupVariableDiscount = 0;
        //     // }
        // }
    }

    public function getFinalAmount()
    {
        return $this->finalCost;
    }

    private function checkParentId($data)
    {

        // $newParentId = new CustomerGroup($this->groupParentId);
        // $newFixedDiscount = $this->group->getFixedDiscount();
        // $newVariableDiscount = $this->group->getVariableDiscount();

        if (!empty($data->getParentId())) {
            $newParent = new CustomerGroup($data->getParentId());

            if ($newParent->getVariableDiscount() == NULL) {
                $this->totalFixedDiscount += $newParent->getFixedDiscount();
            } else {
                if ($this->totalVariableDiscount < $newParent->getVariableDiscount()) {
                    $this->totalVariableDiscount = $newParent->getVariableDiscount();
                }
            }

            $this->checkParentId($newParent);
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
