<?php
include('inc/header.php');

if(isset($_POST['submit-house'])){
        
        $name = htmlspecialchars($_POST['name']);
        $year = htmlspecialchars($_POST['year']);
        $category = htmlspecialchars($_POST['category']);
        $country = htmlspecialchars($_POST['country']);
        $region = htmlspecialchars($_POST['region']);
        $description = htmlspecialchars($_POST['description']);
        $file= $_FILES['images'];
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
                $sth = $db->prepare("INSERT INTO houses(name,year, category,country,region,description,image) VALUES (:name, :year, :category, :country, :region, :description, :image)
                ");
                $sth->bindValue(':name',$name);
                $sth->bindValue(':year',$year);
                $sth->bindValue(':category',$category);
                $sth->bindValue(':country',$country);
                $sth->bindValue(':region',$region);
                $sth->bindValue(':description',$description);
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
