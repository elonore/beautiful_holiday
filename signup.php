<?php
require('./inc/header.php');
require('./inc/head.php');

if (isset($_POST['submit-signup'])){
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $email = htmlspecialchars($_POST['email']);
    $password1 = htmlspecialchars($_POST['password1']);
    $password2 = htmlspecialchars($_POST['password2']);

    if($sql = $db->query("SELECT * FROM users WHERE email = '$email'")){
        $compteur = $sql->rowCount();
        if($compteur != 0){
            $message = "<div class ='alert1'> Il y a déja un compte possédant cet e-mail </div>";
        }elseif(!empty($email) && !empty($email)){
            if($password1 == $password2){
                $password1 = password_hash($password1, PASSWORD_DEFAULT);
                $sth = $db->prepare("INSERT INTO users (firstname, lastname, email, password, user_type) VALUES (:firstname, :lastname, :email, :password1, :user_type)");

                $sth->bindValue(':firstname',$firstname);
                $sth->bindValue(':lastname',$lastname);
                $sth->bindValue(':email',$email);
                $sth->bindValue(':password1',$password1);
                $sth->bindValue(':user_type', 1);

                
                if($sth->execute()){


                    $message =  "<div class = 'success'>
                                 <h3>Vous êtes inscrit avec succès.</h3>
                                <p>Cliquez ici pour vous <a href='pageconnexion.php'>connecter</a></p>
                                 </div>";

                }else{
                    $message = "<div class ='alert alert-danger'> Les mots de passes ne concordent pas </div>";

                }
                                 
                    $message = "<div class ='alert alert-success'> Votre compte a bien été crée </div>";
                }
            }else{
                $message = "<div class ='alert alert-danger'> Les mots de passes ne concordent pas </div>";
            }
        }else{
            $message = "<div class ='alert alert-danger'> Veuillez remplir les champs correspondants </div>";
        }
}else{
    $message = "<div class ='alert alert-danger'> Une erreur vient de se produire.</div>";
}
      
?>


<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Sign Up</button>

<div id="id01" class="modal-signup">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" action="signup.php" method="POST">
    <div class="container">
      <p>Please fill in this form to create an account.</p>
      <hr>

      <label for="firstname"><b>First Name</b></label>
      <input type="text" placeholder="Enter your first name" name="firstname" required>

      <label for="lastname"><b>Last Name</b></label>
      <input type="text" placeholder="Enter your last name" name="lastname" required>

      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>

      <label for="password"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password1" required>

      <label for="password"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="password2" required>

      <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" class="signup-btn" name="submit-signup">Sign Up</button>
      </div>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

</script>

 
<?php
    require("inc/footer.php"); 
?>
