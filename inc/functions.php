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
function displayproperties()
{
    global $db;
    $sql = $db->query("SELECT * FROM properties");
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
                    <p>Category : <?php echo $row['category_id']; ?></p>
                    <p>Address: <?php echo $row['address']; ?></p>
                    <p>Country: <?php echo $row['country_id']; ?></p>
                    <p>City : <?php echo $row['city_id']; ?></p>
                    <p>Region : <?php echo $row['region_id']; ?></p>
                    <p>Comment: <?php echo $row['comment_id']; ?></p>
                    <p>User: <?php echo $row['user_id']; ?></p>
                   
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