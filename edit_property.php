<?php
require('inc/header.php');
require('inc/head.php');


$id = $_GET['id'];
    $sql2 = $db->query("SELECT * FROM `properties` WHERE id = $id");
    $row = $sql2->fetch();
?>


<div class="container">
        <h1> Edit this property </h1>
                <form method="post" action="edit_property_post.php" enctype="multipart/form-data">
                    <div class="form-group col-6">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= $row['name']?>">
                    </div>
                    <div class="form-group col-6">
                        <label for="year">Year</label>
                        <input type="text" class="form-control" id="year" name="year"  value="<?php echo $row['year']?>">
                    </div>
                    <div class="form-group col-6">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" id="description" name="description" value="<?php echo $row['description']?>">
                    </div>
                    <div class="form-group col-6">
                        <label for="category">Select a category:</label>
                            <select id="category" name="category">
                                <option value="1">Flat</option>
                                <option value="2">House</option>
                                <option value="3" selected>Tiny House</option>
                                <option value="4">Villa</option>
                            </select>
                    </div>
                    <div class="form-group col-6">
                        <label for="address">Addresss</label>
                        <input type="text" class="form-control" id="address" name="address"  value="<?php echo $row['address']?>">
                    </div>
                    <div class="form-group col-6">
                        <label for="country">Select a country:</label>
                            <select id="country" name="country">
                                <option value="1">USA</option>
                                <option value="2">Denmark</option>
                                <option value="3" selected>Spain</option>
                                <option value="4">Italy</option>
                                <option value="5">Sweden</option>
                                <option value="6">Norway</option>
                                <option value="7">France</option>
                            </select>
                    </div>
                    <div class="form-group col-6">
                        <label for="city">Select a city:</label>
                            <select id="city" name="city">
                                <option value="1">San Franciso</option>
                                <option value="2">Odense</option>
                                <option value="3" selected>Madrid</option>
                                <option value="4">Venice</option>
                                <option value="5">Malmö</option>
                                <option value="6">Reine</option>
                                <option value="7">Marseille</option>
                                <option value="8">Aix en Provence</option>
                                <option value="9">Beaulieu</option>
                                <option value="10">Copenhagen</option>
                                <option value="11">Los Angeles</option>
                            </select>
                    </div>
                    <div class="form-group col-6">
                        <label for="region">Select a region:</label>
                            <select id="region" name="region">
                                <option value="1">California</option>
                                <option value="2">Region Syddanmark</option>
                                <option value="3" selected>Catalonia</option>
                                <option value="4">Veneto</option>
                                <option value="5">Skåne</option>
                                <option value="6">Lofoten Islands</option>
                                <option value="7">Paca</option>
                                <option value="8">Ardèche</option>
                            </select>
                    </div>
                    <div class="form-group col-6">
                        <label for="image">Image</label>
                        <input type="file" class="img-fluid form-control" id="image" name="image" placeholder="image" width="450" height="450">
                    </div>
                    <input type="hidden" name ="ids" value="<?= $id; ?>"/>
                    <input type="submit" class="myButton1" value="Edit this house" name="edit-property"  />
                    <a href="index.php" class="myButton1">Retour</a>
                </form>
</div>
