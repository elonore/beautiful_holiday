<?php
require('inc/head.php');

function getFlash()
{
    if (isset($_SESSION['flash'])) {
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $flash;
    }
}


function isLoggedIn()
{
    if (isset($_SESSION['user'])) {
        return true;
    } else {
        return false;
    }
}


//faire la fonction displayproperties avec toutes les propriétés et avec user et utilisdateur //
// $sql = $db->query(SELECT * FROM house LEFT JOIN city ON house.city_id = city.id LEFT JOIN region ON house.region_id = region.id LEFT JOIN
// comment ON house.comment_id = comment.id LEFT JOIN user ON house.user_id = user.id);





function displayproperties()
{
    global $db;
    $sql = $db->query("SELECT * FROM properties LEFT JOIN categories on properties.category_id = categories.id LEFT JOIN countries on properties.country_id = countries.id LEFT JOIN users ON properties.user_id = users.id LEFT JOIN regions on properties.region_id = regions.id LEFT JOIN cities on properties.city_id = cities.id   ");
    $sql->setFetchMode(PDO::FETCH_ASSOC);

    while ($row = $sql->fetch()) {

?>
        <div class="card p-3 m-2 col-5" style="max-width:35rem;">
            <div class="pi-text">
                <div class="text-center">
                    <h6><?php echo $row['name']; ?></h6>
                    <br>
                    <p>Year : <?php echo $row['year']; ?></p>
                    <p>Description: <?php echo $row['description']; ?></p>
                    <p>Category : <?php echo $row['category_name']; ?></p>
                    <p>Address: <?php echo $row['address']; ?></p>
                    <p>Country: <?php echo $row['country_name']; ?></p>
                    <p>City : <?php echo $row['city_name']; ?></p>
                    <p>Region : <?php echo $row['region_name']; ?></p>

                    <img src="assets/uploads/<?php echo $row['image']; ?>" class="im-fluid" alt="photo" width="250" height="300">
                </div>

                <br>

                <?php
                if (isset($_SESSION['email']) && ($_SESSION['password'])) {
                    $id = $_SESSION['id'];
                ?>
                    <div class="text-center">
                        <a class="myButton1" href="display_oneproperty.php?id=<?php echo $row['id']; ?>">See</a>
                        <a class="myButton1" href="edit_property.php?id=<?php echo $row['id']; ?>">Edit</a>
                        <a class="myButton1" href="add_property.php?id=<?php echo $row['id']; ?>">Add</a>
                        <a class="myButton1" href="delete_property_post.php?id=<?php echo $row['id']; ?>">Delete</a>
                    </div>
            </div>
        </div>
    <?php
                } else {
    ?>
                    <div class="text-center">
                    <a class="myButton1" href="display_oneproperty.php?id=<?php echo $row['id']; ?>">Voir</a>
            </div>
        </div>
        </div>
<?php
                }
            }
        }
?>