<?php
include('inc/header.php');
require('inc/head.php');

if(isset($_POST['submit-property'])){
        
        $name = htmlspecialchars($_POST['name']);
        $year = htmlspecialchars($_POST['year']);
        $description = htmlspecialchars($_POST['description']);
        $category_id = htmlspecialchars($_POST['category']);
        $address = htmlspecialchars($_POST['address']);
        $country_id = htmlspecialchars($_POST['country']);
        $city_id = htmlspecialchars($_POST['city']);
        $region_id = htmlspecialchars($_POST['region']);
        $file= $_FILES['image'];
        $id = ($_SESSION['id']);
        

        if($file['size'] <= 1000000){

            $valid_ext = array('jpg','jpeg','gif','png');
            $check_ext = strtolower(substr(strrchr($file['name'], '.'),1));
            
            if(in_array($check_ext, $valid_ext)){

            $imgname = uniqid() . '_' . $file['name'];
            $upload_dir = "./assets/uploads/";
            $upload_name = $upload_dir . $imgname;
            $move_result = move_uploaded_file($file['tmp_name'], $upload_name);

        
            if($move_result){
                $sth = $db->prepare("INSERT INTO properties(name,year,description,category_id,address, country_id,city_id,region_id,user_id,image) VALUES (:name, :year, :description, :category, :address, :country, :city, :region,:user_id, :image)
                ");
              $sth->bindValue(':name',$name);
              $sth->bindValue(':year',$year);
              $sth->bindValue(':description',$description);
              $sth->bindValue(':category',$category_id);
              $sth->bindValue(':address',$address);
              $sth->bindValue(':country',$country_id);
              $sth->bindValue(':city',$city_id);
              $sth->bindValue(':region',$region_id);
              $sth->bindValue(':user_id',$id);
              $sth->bindValue(':image',$imgname);
              $sth->execute();
              header('Location: index.php');


                }
            }else{
                echo "error";
            }
        }else{
            echo "problème d'image";
        }
    }
        ?>
