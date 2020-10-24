
<?php
    $page='display_onehouse.php';
    require('inc/header.php');
?>

<?php

// Est-ce que l'id existe et n'est pas vide dans l'URL
if(isset($_GET['id']) && !empty($_GET['id'])){
   

    // On nettoie l'id envoyé
    $id = strip_tags($_GET['id']);

    $sql = 'SELECT * FROM `houses` WHERE `id` = :id;';

    // On prépare la requête
    $query = $db->prepare($sql);

    // On "accroche" les paramètre (id)
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // On exécute la requête
    $query->execute();

    // On récupère le row
    $row = $query->fetch();

    // On vérifie si le row existe
    if(!$row){
        $_SESSION['erreur'] = "Cet id n'existe pas";
        header('Location: index.php');
    }
}else{
    $_SESSION['erreur'] = "URL invalide";
    header('Location: index.php');
}
?>


    <main class="container-sm">
        <div class="row">
            <section class="col-6">
                <h1>Details about the house</h1>
                <p>Name : <?= $row['name'] ?></p>
                <p>Year : <?= $row['year'] ?></p>
                <p>Category : <?= $row['category'] ?></p>
                <p>Country : <?= $row['country'] ?></p>
                <p>Region : <?= $row['region'] ?></p>
                <p>Description : <?= $row['description'] ?></p>
                <img src="assets/uploads/<?php echo $row['image'];?>" alt="photo" width="250" height="300">
                <div class="center">
                    <a class="myButton1" href="index.php?id=<?php echo $row['id'];?>">Back to the homepage</a>
                </div>
            </section>
        </div>
    </main>