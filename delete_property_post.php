<?php
require('inc/header.php');
include('inc/connect.php');
require('inc/head.php');

$id = $_GET['id'];

if(isset($_GET['id']) && !empty($_GET['id'])) {
        $id= htmlspecialchars($_GET['id']);
        $sth = $db->prepare('DELETE FROM properties WHERE id =?'); 
        $sth->bindValue(1, $id);
            $sth->execute();

            header('Location: index.php');
}

?>

