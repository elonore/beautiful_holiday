<?php
require('inc/header.php');


$id = $_GET['id'];
    $sql2 = $db->query("SELECT * FROM `houses` WHERE id = $id");
    $row = $sql2->fetch();
?>


<div class="container">
        <h1> Edit this house</h1>
                <form method="post" action="edit_house_post.php" enctype="multipart/form-data">
                    <div class="form-group col-6">
                        <label for="1">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="name" value="<?php echo $row[1]?>">
                    </div>
                    <div class="form-group col-6">
                        <label for="2">Year</label>
                        <input type="text" class="form-control" id="year" name="year"  value="<?php echo $row[2]?>">
                    </div>
                    <div class="form-group col-6">
                        <label for="3">Category</label>
                        <input type="text" class="form-control" id="category" name="category"  value="<?php echo $row[3]?>">
                    </div>
                    <div class="form-group col-6">
                        <label for="4">Country</label>
                        <input type="text" class="form-control" id="country" name="country"  value="<?php echo $row[4]?>">
                    </div>
                    <div class="form-group col-6">
                        <label for="5">Region</label>
                        <input type="text" class="form-control" id="region" name="region" value="<?php echo $row[5]?>">
                    </div>
                    <div class="form-group col-6">
                        <label for="6">Description</label>
                        <input type="text" class="form-control" id="description" name="description" value="<?php echo $row[6]?>">
                    </div>
                    <div class="form-group col-6">
                        <label for="7">Image</label>
                        <input type="file" class="img-fluid form-control" id="image" name="image" placeholder="image" width="250" height="300">
                    </div>
                    <input type="hidden" name ="ids" value="<?= $id; ?>"/>
                    <input type="submit" class="myButton1" value="Edit this house" name="edit-house"  />
                    <a href="index.php" class="myButton1">Retour</a>
                </form>
</div>
