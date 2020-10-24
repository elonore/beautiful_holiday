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


//faire la fonction displaywines avec toutes les bouteilles et avec user et utilisdateur //
function displayhouses()
{
    global $db;
    $sql = $db->query("SELECT * FROM houses");
    $sql->setFetchMode(PDO::FETCH_ASSOC);

    while ($row = $sql->fetch()) {

?>
        <div class="card p-3 m-2 col-5" style="max-width:35rem;">
            <div class="pi-text">
                <div class="text-center">
                    <h6><?php echo $row['name']; ?></h6>
                    <br>
                    <p>Year : <?php echo $row['year']; ?></p>
                    <p>Category : <?php echo $row['category']; ?></p>
                    <p>Country : <?php echo $row['country']; ?></p>
                    <p>Region : <?php echo $row['region']; ?></p>
                    <p>Description: <?php echo $row['description']; ?></p>
                    <img src="assets/uploads/<?php echo $row['image']; ?>" class="im-fluid" alt="photo" width="250" height="300">
                </div>

                <br>

                <?php
                if (isset($_SESSION['mail']) && ($_SESSION['password'])) {
                    $id = $_SESSION['id'];
                ?>
                    <div class="text-center">
                        <a class="myButton1" href="display_onehouse.php?id=<?php echo $row['id']; ?>">Voir</a>
                        <a class="myButton1" href="edit_house.php?id=<?php echo $row['id']; ?>">Modifier</a>
                        <a class="myButton1" href="add_house.php?id=<?php echo $row['id']; ?>">Ajouter</a>
                        <a class="myButton1" href="delete_house_post.php?id=<?php echo $row['id']; ?>">Supprimer</a>
                    </div>
            </div>
        </div>
    <?php
                } else {
    ?>
                    <div class="text-center">
                    <a class="myButton1" href="display_onehouse.php?id=<?php echo $row['id']; ?>">Voir</a>
            </div>
        </div>
        </div>
<?php
                }
            }
        }
?>