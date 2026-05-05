<?php 

include_once 'header.php';
include './oeuvres.php';

// Si $_GET['id'] n'existe pas ou est null (false)
// On redirige vers index.php
if(!isset($_GET['id'])){
    header('location: index.php');
    exit();
}

// L'id de l'URL est stocké dans la variable $id en string par défaut
// la fonction "intval()" retourne la valeur numerique de la variable $_GET['id']
$id = intval($_GET['id']);

// Variable NULL qu'on utilisera plus tard
$oeuvre_detail = null;

// Pour chaques sous-tableaux du tableau $oeuvres
foreach($oeuvres as $oeuvre){
    // Si l'id de l'URL stocké dans $id est égale à l'id d'un sous tableau
    if($id === $oeuvre['id']){
        // On stocke le sous tableau dans $oeuvre_detail
        $oeuvre_detail = $oeuvre;
        break;
    }
}

// Si $oeuvre_detail est restée NULL 
// On renvoit vers index.php
if($oeuvre_detail === null){
    header('location: index.php');
}

?>
<article id="detail-oeuvre">
        <div id="img-oeuvre">
            <img src="<?= $oeuvre_detail['image'] ?>" alt="<?= $oeuvre_detail['titre'] ?>">
        </div>
        <div id="contenu-oeuvre">
            <h1><?= $oeuvre_detail['titre'] ?></h1>
            <p class="description"><?= $oeuvre_detail['artiste'] ?></p>
            <p class="description-complete">
                <?= $oeuvre_detail['description'] ?>
            </p>
        </div>
    </article>
<?php

include_once 'footer.php';

?>
