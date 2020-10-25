<?php
require('inc/header.php');

if(isset($_POST['edit-property'])){
        
        $name = htmlspecialchars($_POST['name']);
        $year = htmlspecialchars($_POST['year']);
        $description = htmlspecialchars($_POST['description']);
        $category = htmlspecialchars($_POST['category_id']);
        $address = htmlspecialchars($_POST['address']);
        $country = htmlspecialchars($_POST['country_id']);
        $city = htmlspecialchars($_POST['city_id']);
        $region = htmlspecialchars($_POST['region_id']);
        $comment = htmlspecialchars($_POST['comment_id']);
        $user = htmlspecialchars($_POST['user_id']);
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
                    $sth = $db->prepare("UPDATE properties SET name=:name,year=:year,description=:description, category_id=:category_id,address=:address,country_id=:country_id,city_id=:city_id,region_id=:region_id,comment_id=:comment_id,user_id=:user_id,image=:image WHERE id=$id
                    ");
                    $sth->bindValue(':name',$name);
                    $sth->bindValue(':year',$year);
                    $sth->bindValue(':description',$description);
                    $sth->bindValue(':category_id',$category);
                    $sth->bindValue(':address',$address);
                    $sth->bindValue(':country_id',$country_id);
                    $sth->bindValue(':city_id',$city_id);
                    $sth->bindValue(':region_id',$region_id);
                    $sth->bindValue(':comment_id',$comment_id);
                    $sth->bindValue(':user_id',$user_id);
                    $sth->bindValue(':image',$imgname);
                   
                    $sth->execute();
                    header('Location: display_oneproperty.php');


                }
            }  else {
                echo "Merci de remplir le formulaire en Entier";
            }
        } else {
            echo "Erreur vérifier le format ou le poids d'image";
        }
    }
?>