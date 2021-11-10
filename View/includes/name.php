<?php

$customer = new Customer();
$allCustomerData = $customer->getFirstname();
// $groupId = $customer->

?>

<div>
    <label for="name">Usersname</label>
    <select name="firstname">
        <?php
        while ($row = mysqli_fetch_assoc($allCustomerData)) {
        ?>
            <option value="">
                <?php
                echo $row['firstname'] .  " " . $row['lastname'];
                ?>
            </option>

        <?php
        }
        ?>
    </select>

</div>