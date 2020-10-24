<?php
require('inc/header.php');

if(isset($_POST['edit-house'])){
        
        $name = htmlspecialchars($_POST['name']);
        $year = htmlspecialchars($_POST['year']);
        $category = htmlspecialchars($_POST['category']);
        $country = htmlspecialchars($_POST['country']);
        $region = htmlspecialchars($_POST['region']);
        $description = htmlspecialchars($_POST['description']);
        $file= $_FILES['image'];
        // $id = ($_SESSION['id']);
        $id = ($_POST['ids']);

        if($file['size'] <= 1000000){

            $valid_ext = array('jpg','jpeg','gif','png');
            $check_ext = strtolower(substr(strrchr($file['name'], '.'),1));
            
            if(in_array($check_ext, $valid_ext)){

            $imgname = uniqid() . '_' . $file['name'];
            $upload_dir = "./assets/uploads/";
            $upload_name = $upload_dir . $imgname;
            $move_result = move_uploaded_file($file['tmp_name'], $upload_name);

        
                if($move_result){
                    $sth = $db->prepare("UPDATE houses SET name=:name,year=:year,category=:category,country=:country,region=:region,description=:description,image=:image WHERE id=$id
                    ");
                    $sth->bindValue(':name',$name);
                    $sth->bindValue(':category',$category);
                    $sth->bindValue(':country',$country);
                    $sth->bindValue(':region',$region);
                    $sth->bindValue(':region',$region);
                    $sth->bindValue(':description',$description);
                    $sth->bindValue(':image',$imgname);
                   
                    $sth->execute();
                    header('Location: display_onehouse.php');


                }
            }  else {
                echo "Merci de remplir le formulaire en Entier";
            }
        } else {
            echo "Erreur vérifier le format ou le poids d'image";
        }
    }
?>