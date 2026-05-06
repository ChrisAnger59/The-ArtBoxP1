<?php 

// Intègre header.php (une seule fois) - affichage de l'en-tête
// Intègre oeuvres.php - charge le tableau $oeuvres
include_once 'header.php';
include 'oeuvres.php';

// Si 'id' n'est pas présent dans l'URL
// On redirige vers index.php et stoppe le script
if(!isset($_GET['id'])){
    header('location: index.php');
    exit();
}

// Récupère l'id de l'URL et le convertit en entier
$id = intval($_GET['id']);

// Contiendra l'oeuvre trouvée, ou restera NULL si aucune correspondance
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
// On renvoit vers index.php et stoppe le script
if($oeuvre_detail === null){
    header('location: index.php');
    exit;
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

// Intègre footer.php (une seule fois) - affichage du pied de page
include_once 'footer.php';

?>
