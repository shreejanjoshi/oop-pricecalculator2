<?php
$productName = new Product();

$result = $productName->getName();

// $result3 = ($result . $result2);
?>

<div>
    <label for="name">products</label>
    <select name="firstname">
        <!-- <option value="volvo">Volvo</option>
  <option value="saab">Saab</option>
  <option value="fiat">Fiat</option>
  <option value="audi">Audi</option> -->
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <option value="">
                <?php
                echo $row['name'];
                ?>
            </option>


        <?php
        }
        ?>
    </select>

</div>