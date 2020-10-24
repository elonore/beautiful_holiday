
<?php
require ('inc/header.php');
require ('inc/head.php');
?>


    <div class="edit-wine container">
        <h2> <box-icon type='solid' name='wine'></box-icon> Add a house </h2>
                <form method="post" action="add_house_post.php" enctype="multipart/form-data">
                    <div class="form-group col-6">
                        <!-- <label for="2">Name</label> -->
                        <input type="text" class="form-control" id="name" name="name" placeholder="name">
                    </div>
                    <div class="form-group col-6">
                        <!-- <label for="3">Year</label> -->
                        <input type="description" class="form-control" id="year" name="year" placeholder="year">
                    </div>
                    <div class="form-group col-6">
                        <!-- <label for="8">Grapes</label> -->
                        <input type="text" class="form-control" id="category" name="category" placeholder="category">
                    </div>
                    
                    <div class="form-group col-6">
                        <!-- <label for="4">Country</label> -->
                        <input type="text" class="form-control" id="city" name="country" placeholder="country">
                    </div>
                    <div class="form-group col-6">
                        <!-- <label for="6">Region</label> -->
                        <input type="text" class="form-control" id="region" name="region" placeholder="region">
                    </div>
                    <div class="form-group col-6">
                        <!-- <label for="6">description</label> -->
                        <input type="text" class="form-control" id="description" name="description" placeholder="description">
                    </div>
                    <div class="form-group col-6">
                        <!-- <label for="6">Img</label> -->
                        <input type="file" class="form-control" id="image" name="image" placeholder="image">
                    </div>
                    <input type="submit" class="myButton1" value="Ajouter un vin" name="submit-house"  />
                    <a class="myButton1" href="index.php">Retour</a>
            </form>

                <br>
    </div>


    <?php
require ('inc/footer.php');
 
?>
