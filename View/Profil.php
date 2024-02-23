<?php
$title = "Profil";
 require_once("components/Header.php");
 require_once "templates/Formulaire.php";
 use Templates\Formulaire;
?>
<script defer src="js/Profil.js"></script>

<div class="container flex center item-center col">
    <img src="public/image/aots.png" class="img-logo" alt="">

    <?php 
    $formulaire = new Formulaire();
    $formulaire->open('POST','formulaire_profile');
    $formulaire->input('Prénom:','text','firstname', "{$result['firstname']}");
    $formulaire->input('Nom:','text','lastname', "{$result['lastname']}");
    $formulaire->input('Email:', 'email', 'email', "{$result['email']}");
    $formulaire->password('password','Password');
    $formulaire->input('Anniversaire:','date','birthday' , "{$result['birthday']}");
    $formulaire->input('Pseudonyme:','text','pseudo', "{$result['pseudo']}");
    $formulaire->input('Ville:','text','city', "{$result['city']}");
    $formulaire->input('Téléphone:','int','phone', "{$result['phone']}");
    $formulaire->button('info','Modifier');
    $formulaire->close();
    ?>
    <div class='flex row center gap-4 item-center'>
        <a class="py-2 text-success" href="accueil">Retour a l'accueil</a>
        <a class="text-danger" href="profil_suppression">Supprimer mon compte</a>
    </div>
</div>