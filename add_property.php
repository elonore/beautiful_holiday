
<?php
require ('inc/header.php');
require ('inc/head.php');
?>


    <div class="edit-property container">
        <h2>Add a property </h2>
                <form method="post" action="add_property_post.php" enctype="multipart/form-data">
                    <div class="form-group col-6">
                        <label for="2">Name: </label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="name">
                    </div>
                    <div class="form-group col-6">
                        <label for="year">Year: </label>
                        <input type="date" id="year" name="year">
                    </div>
                    <div class="form-group col-6">
                    <label for="description">Description: </label>
                        <textarea id="description" name="description" rows="4" cols="50">
                        </textarea>
                    </div>
                    <div class="form-group col-6">
                        <label for="category">Choose a category:</label>
                            <select id="category" name="category">
                                <option value="1">Flat</option>
                                <option value="2">House</option>
                                <option value="3" selected>Tiny House</option>
                                <option value="4">Villa</option>
                            </select>
                    </div>
                    <div class="form-group col-6">
                        <label for="text">Your address: </label>
                        <input type="text" id="address" name="address">
                    </div>
                    <div class="form-group col-6">
                        <label for="country">Choose a country:</label>
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
                        <label for="city">Choose a city:</label>
                            <select id="city" name="city">
                                <option value="1">San Franciso</option>
                                <option value="2">Odense</option>
                                <option value="3" selected>Madrid</option>
                                <option value="4">Venice</option>
                                <option value="5">Malmö</option>
                                <option value="6">Reine</option>
                                <option value="7">Marseille</option>
                                <option value="8">Aix en Provence</option>
                                <option value="9">Murano Island</option>
                                <option value="10">Copenhagen</option>
                                <option value="11">Los Angeles</option>
                            </select>
                    </div>
                    <div class="form-group col-6">
                        <label for="region">Choose a region:</label>
                            <select id="region" name="region">
                                <option value="1">California</option>
                                <option value="2">Region Syddanmark</option>
                                <option value="3" selected>Catalonia</option>
                                <option value="4">Veneto</option>
                                <option value="5">Skåne</option>
                                <option value="6">Lofoten Islands</option>
                                <option value="7">Paca</option>
                            </select>
                    </div>
                    <div class="form-group col-6">
                    <label for="comment">Add your comment: </label>
                        <textarea id="description" name="description" rows="4" cols="50">
                        </textarea>
                    </div>
                    <div class="form-group col-6">
                        <label for="user_id">Your name: </label>
                        <input type="text" class="form-control" id="user" name="user" placeholder="your name">
                    </div>
                    <div class="form-group col-6">
                        <!-- <label for="6">Img</label> -->
                        <input type="file" class="form-control" id="image" name="image" placeholder="image">
                    </div>
                    <input type="submit" class="myButton1" value="Add a property" name="submit-property"  />
                    <a class="myButton1" href="index.php">Retour</a>
            </form>

                <br>
    </div>


    <?php
require ('inc/footer.php');
 
?>
