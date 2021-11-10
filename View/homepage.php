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
var_dump($customers->getCustomers());
$data = $customers->getCustomers();
?>


<div>
    <label for="name">Usersname</label>
    <select name="firstname">
        <option value="name">

        <?php
        while ($row = mysqli_fetch_assoc($data)) {
        ?>
            <option value="">
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

</div>
<?php require 'includes/footer.php' ?>