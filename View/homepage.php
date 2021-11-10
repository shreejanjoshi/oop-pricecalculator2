<?php require 'Model/Customer.php' ?>
<?php require 'Model/CustomerGroup.php' ?>
<?php require 'Model/Product.php' ?>

<?php require 'includes/header.php' ?>

<!-- this is the view, try to put only simple if's and loops here.
Anything complex should be calculated in the model -->
<!-- <section>
    this is form
</section> -->
<?php
$customers = new HomepageController();
$data = $customers->getCustomers();
?>


<div>
    <form action="" method="POST">  
    <label for="name">Username</label>
    <select name="customername"> 
        <?php
        while ($row = mysqli_fetch_assoc($data)) {
        ?>
            <option value="name" <?php echo $row['id'];?>>
                <?php
                echo $row['firstname'] .  " " . $row['lastname'];
                ?>
            </option>

        <?php
        }
        ?>

        </option>
    </select>

    <label for="name">group</label>
    <select name="firstname"></select>

    <label for="name">Product</label>
    <select name="firstname"></select>
    </form>
    <input type="submit" name="submit" value="submit">
</div>

<?php require 'includes/footer.php' ?>