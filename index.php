<?php

declare(strict_types=1);

//include all your model files here
require 'Model/User.php';
//include all your controllers here
require 'Controller/HomepageController.php';
require 'Controller/InfoController.php';

require 'Model/Customer.php';
require 'Model/CustomerGroup.php';
require 'Model/Product.php';

//you could write a simple IF here based on some $_GET or $_POST vars, to choose your controller
//this file should never be more than 20 lines of code!



?>

<?php include "View/includes/name.php"; ?>
<?php //include "View/includes/groupname.php"; 
?>
<?php include "View/includes/product.php"; ?>
<input type="submit" name="submit" value="submit">
<?php include "View/includes/footer.php"; ?>

<?php



$controller = new HomepageController();
if (isset($_GET['page']) && $_GET['page'] === 'info') {
    $controller = new InfoController();
}


$controller->render($_GET, $_POST);
