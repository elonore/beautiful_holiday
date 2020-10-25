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
        $email = htmlspecialchars($_POST['email']);
        $user_pass = htmlspecialchars($_POST['password']);
        $sql = $db->query("SELECT * FROM users WHERE email = '$email'");
        if ($row = $sql->fetch()) {
            $db_id = $row['id'];
            $db_email = $row['email'];
            $db_pass = $row['password'];
            if (password_verify($user_pass, $db_pass)) {
                $_SESSION['id'] = $db_id;
                $_SESSION['email'] = $db_email;
                $_SESSION['password'] = $db_pass;

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
            <input class="formheadconnect" type="text" name="email" class="formcontrol id=" exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your email...">
            <input class="formheadconnect2" type="password" name="password" class="formcontrol" id="exampleInputPassword1" placeholder="Enter your password...">
            <button type="submit" name="submit-login" class="myButton1">Connexion</button>
        </form>

    </div>

<?php
     require('inc/footer.php');
?>
