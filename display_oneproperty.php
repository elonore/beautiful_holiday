
<?php
    $page='display_oneproperty.php';
    require('inc/header.php');
    require('inc/head.php');
?>

<?php

// Est-ce que l'id existe et n'est pas vide dans l'URL
if(isset($_GET['id']) && !empty($_GET['id'])){
   

    // On nettoie l'id envoyé
    $id = strip_tags($_GET['id']);

     $sql = 'SELECT * FROM `properties` WHERE `id` = :id;';

    // $sql = 'SELECT * FROM properties LEFT JOIN categories on properties.category_id = categories.id LEFT JOIN countries on properties.country_id = countries.id LEFT JOIN users ON properties.user_id = users.id LEFT JOIN regions on properties.region_id = regions.id LEFT JOIN cities on properties.city_id = cities.id';

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
                <h1>Details about the property</h1>
                <p>Name : <?= $row['name'] ?></p>
                <p>Year : <?= $row['year'] ?></p>
                <p>Description : <?= $row['description'] ?></p>
                <p>Category : <?= $row['category_id'] ?></p>
                <p>Address : <?= $row['address'] ?></p>
                <p>Country : <?= $row['country_id'] ?></p>
                <p>City : <?= $row['city_id'] ?></p>
                <p>Region : <?= $row['region_id'] ?></p>
                <img src="assets/uploads/<?php echo $row['image'];?>" alt="photo" width="450" height="450">
                <div class="center">
                    <a class="myButton1" href="index.php?id=<?php echo $row['id'];?>">Back to the homepage</a>
                </div>
            </section>
        </div>
    </main>