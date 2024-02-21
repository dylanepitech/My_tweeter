<?php
$title = "Inscription";
 require_once("components/Header.php");
 require_once "templates/Formulaire.php";
 use Templates\Formulaire;
?>
<script defer src="js/inscription.js"></script>
<div class="container flex center item-center col h-vh my-3">
    <h1 class='text-light'>Des infos.. pour mieux tweet !</h1>
    <p class='text-info'>Plus que quelques click pour prendre contact avec vos amis ! 👬</p>
    <?php 
    $formulaire = new Formulaire();
    $formulaire->open('POST', 'formulaire_inscription');
    $formulaire->input('Prénom:','text','firstname');
    $formulaire->input('Nom:','text','lastname');
    $formulaire->input('Email:','email','email');
    $formulaire->password('password','Password');
    $formulaire->select_open('Sexe:','sex');
    $formulaire->option("Homme", "Homme");
    $formulaire->option("Femme", "Femme");
    $formulaire->option("Autre", "Autre");
    $formulaire->select_close();
    $formulaire->input('Anniversaire:','date','birthday');
    $formulaire->input('Pseudonyme:','text','pseudo');
    $formulaire->input('Ville:','text','city');
    $formulaire->input('Téléphone:','int','phone');
    $formulaire->checkbox("En cochant cette case j'accepte les CGV", 'cgv');
    echo "<p id='error' class='text-danger fs-2'></p>";
    $formulaire->button('info',"Commencer à tweeter !");
    $formulaire->close();
    echo "<p class='text-light fs-1'>En cochant la case et en validant le formulaire vous accepter les <a href=''>CGV</a> disponible en cliquand sur le lien.</p>"
?>
</div>