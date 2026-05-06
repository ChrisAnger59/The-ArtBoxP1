<?php

// Intègre header.php (une seule fois) - affichage de l'en-tête
// Intègre oeuvres.php - charge le tableau $oeuvres
include_once 'header.php';
include 'oeuvres.php';

?>
<!-- Pour chaque oeuvre, génère une carte cliquable redirigeant vers son détail -->
        <div id="liste-oeuvres">
            <?php foreach($oeuvres as $oeuvre): ?>
                <article class="oeuvre">
            <!-- Lien vers oeuvre.php avec l'id en query string ex: oeuvre.php?id=3 -->
                    <a href="oeuvre.php?id=<?= $oeuvre['id'] ?>">
                        <img src="<?= $oeuvre['image'] ?>" alt="<?= $oeuvre['titre'] ?>">
                        <h2><?= $oeuvre['titre'] ?></h2>
                        <p class="description"><?= $oeuvre['artiste'] ?></p>
                    </a>
                </article>
            <?php endforeach; ?>
        </div>

<?php 

// Intègre footer.php (une seule fois) - affichage du pied de page
include_once 'footer.php';

?>