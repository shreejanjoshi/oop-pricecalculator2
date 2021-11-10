<?php require 'includes/header.php' ?>

<!-- this is the view, try to put only simple if's and loops here.
Anything complex should be calculated in the model -->
<!-- <section>
    this is form
</section> -->
<?php
$customers = new HomepageController();
// var_dump($customers->getCustomers());
$name = $customers->getCustomers();
$product = $customers->getProducts();

?>


<div>
    <form action="" method="POST">
        <label for="name">Usersname</label>
        <select name="name">

            <?php
            while ($row = mysqli_fetch_assoc($name)) { ?>
                <option value="<?php echo $row['id']; ?>">
                    <?php echo $row['firstname'] .  " " . $row['lastname']; ?>
                </option>
            <?php
            }
            ?>

            </option>
        </select>

        <label for="product">Product</label>
        <select name="product">

            <?php
            while ($pro = mysqli_fetch_assoc($product)) { ?>
                <option value="<?php echo $pro['id']; ?>">
                    <?php echo $pro['name'] ?>
                </option>
            <?php
            }
            ?>

            </option>
        </select>

        <input type="submit" name="submit" value="submit">
    </form>
</div>

<?php require 'includes/footer.php' ?>