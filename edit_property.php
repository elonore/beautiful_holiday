<?php
require('inc/header.php');


$id = $_GET['property_id'];
    $sql2 = $db->query("SELECT * FROM `properties` WHERE property_id = $id");
    $row = $sql2->fetch();
?>


<div class="container">
        <h1> Edit this property</h1>
                <form method="post" action="edit_property_post.php" enctype="multipart/form-data">
                    <div class="form-group col-6">
                        <label for="1">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="name" value="<?php echo $row[1]?>">
                    </div>
                    <div class="form-group col-6">
                        <label for="2">Year</label>
                        <input type="text" class="form-control" id="year" name="year"  value="<?php echo $row[2]?>">
                    </div>
                    <div class="form-group col-6">
                        <label for="3">Description</label>
                        <input type="text" class="form-control" id="description" name="description" value="<?php echo $row[3]?>">
                    </div>
                    <div class="form-group col-6">
                        <label for="4">Category</label>
                        <input type="text" class="form-control" id="category" name="category"  value="<?php echo $row[4]?>">
                    </div>
                    <div class="form-group col-6">
                        <label for="5">Addresss</label>
                        <input type="text" class="form-control" id="address" name="address"  value="<?php echo $row[5]?>">
                    </div>
                    <div class="form-group col-6">
                        <label for="6">Country</label>
                        <input type="text" class="form-control" id="country" name="country"  value="<?php echo $row[6]?>">
                    </div>
                    <div class="form-group col-6">
                        <label for="7">City</label>
                        <input type="text" class="form-control" id="city" name="city"  value="<?php echo $row[7]?>">
                    </div>
                    <div class="form-group col-6">
                        <label for="8">Region</label>
                        <input type="text" class="form-control" id="region" name="region" value="<?php echo $row[8]?>">
                    </div>
                    <div class="form-group col-6">
                        <label for="9">Comment</label>
                        <input type="text" class="form-control" id="comment" name="comment" value="<?php echo $row[9]?>">
                    </div>
                    <div class="form-group col-6">
                        <label for="10">Your name</label>
                        <input type="text" class="form-control" id="user_id" name="user_id" value="<?php echo $row[10]?>">
                    </div>
                    <div class="form-group col-6">
                        <label for="11">Image</label>
                        <input type="file" class="img-fluid form-control" id="image" name="image" placeholder="image" width="250" height="300">
                    </div>
                    <input type="hidden" name ="ids" value="<?= $id; ?>"/>
                    <input type="submit" class="myButton1" value="Edit this house" name="edit-property"  />
                    <a href="index.php" class="myButton1">Retour</a>
                </form>
</div>
