<?php
require('./inc/header.php');
require('./inc/head.php');
?>

<nav>
    <?php
    if (isset($_SESSION['mail'])) {
        header('Location:index.php');
    }
    if (isset($_POST['submit-login'])) {
        $user_email = htmlspecialchars($_POST['user_email']);
        $user_pass = htmlspecialchars($_POST['user_password']);
        $sql = $db->query("SELECT * FROM users WHERE user_email = '$user_email'");
        if ($row = $sql->fetch()) {
            $db_id = $row['id'];
            $db_email = $row['user_mail'];
            $db_pass = $row['user_password'];
            if (password_verify($user_pass, $db_pass)) {
                $_SESSION['id'] = $db_id;
                $_SESSION['user_email'] = $db_email;
                $_SESSION['user_password'] = $db_pass;

                $_SESSION['flash'] = "Welcome to House Swaps, you're now logged in";
                header("Location:index.php");
            } else {
                $message = "<div> Mot de passe incorrect.</div>";
            }
        } else {
            $message = "<div> Identifiant inconnu.</div>";
        }
    } ?>

<!-- Login form to send data to the database -->
<div class="text-center">
        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="login-form">
            <input class="formheadconnect" type="text" name="user_email" class="formcontrol id=" exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your email...">
            <input class="formheadconnect2" type="password" name="user_password" class="formcontrol" id="exampleInputPassword1" placeholder="Enter your password...">
            <button type="submit" name="submit-login" class="myButton1">Connexion</button>
        </form>

    </div>

<?php
     require('inc/footer.php');
?>
