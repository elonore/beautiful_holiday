<?php
include('inc/header.php');

if(isset($_POST['submit-property'])){
        
        $name = htmlspecialchars($_POST['name']);
        $year = htmlspecialchars($_POST['year']);
        $description = htmlspecialchars($_POST['description']);
        $category = htmlspecialchars($_POST['category_id']);
        $address = htmlspecialchars($_POST['address']);
        $country_id = htmlspecialchars($_POST['country_id']);
        $city_id = htmlspecialchars($_POST['city_id']);
        $region_id = htmlspecialchars($_POST['region_id']);
        $comment_id = htmlspecialchars($_POST['comment_id']);
        $user_id = htmlspecialchars($_POST['user_id']);
        $file= $_FILES['images'];
        $id = ($_SESSION['property_id']);
        

        if($file['size'] <= 1000000){

            $valid_ext = array('jpg','jpeg','gif','png');
            $check_ext = strtolower(substr(strrchr($file['name'], '.'),1));
            
            if(in_array($check_ext, $valid_ext)){

            $imgname = uniqid() . '_' . $file['name'];
            $upload_dir = "./assets/uploads/";
            $upload_name = $upload_dir . $imgname;
            $move_result = move_uploaded_file($file['tmp_name'], $upload_name);

        
            if($move_result){
                $sth = $db->prepare("INSERT INTO properties(name,year,description,category_id,address, country_id,city_id,region_id,comment_id,user_id,image) VALUES (:name, :year, :description, :category_id, :address, :country_id, :city_id, :region_id, :comment_id, :user_id, :image)
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
