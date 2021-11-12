<div class="boxwrapper">
<div class="headerbox">
<?php require 'includes/header.php' ?>
</div>

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


<div class="box">

    <form action="" method="POST">
        <label for="name" class="label">Username : </label>
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

        <label for="product" class="label">Product : </label>
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
<div class="box">
    <h3>Total : <span> <?php
    if (isset($_POST) && !empty($_POST)) {
        echo $customers->getFinalAmount();
    }
    ?></span> </h3>
   
    </div>
    <?php require 'includes/footer.php' ?>
    </div>
<style>
    body{
        background-color: grey;
        color: whitesmoke;
        
    }
    .boxwrapper{
        width: 1000px;
        height: 500px;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background-color: #ffffff15;
        backdrop-filter: blur(12px);
        border: 2px solid red;

    }
    .headerbox{
        margin-bottom: 30px;
    }
    .label{
        padding: 10px;
    }
    
</style>

