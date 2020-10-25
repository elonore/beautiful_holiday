<?php
require('inc/header.php');
require('inc/head.php');

$property_id = $_GET['property_id'];

if(isset($_GET['property_id']) && !empty($_GET['property_id'])) {
        $id= htmlspecialchars($_GET['id']);
        $sth = $db->prepare('DELETE FROM properties WHERE property_id =?'); 
        $sth->bindValue(1, $property_id);
            $sth->execute();

            header('Location: index.php');
}

?>

