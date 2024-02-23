<?php
$title = "Connexion";
 require_once("components/Header.php");
 require_once "templates/Formulaire.php";
 use Templates\Formulaire;
?>

<script defer src="js/connexion.js"></script>
<div class="container flex center item-center col h-vh">
    <a class="text-info py-2" href="http://localhost:8888/My_tweeter/">⬅️ Menu principal</a>
    <h1 class='text-light'>Prêt a tweet ?</h1>
    <p class='text-info'>Plus que quelques click pour prendre contact avec vos amis ! 👬</p>
    <?php 
    $formulaire = new Formulaire();
    $formulaire->open('POST', "formulaire_connexion");
    $formulaire->input('Email','email','email');
    $formulaire->password('password','Password');
    $formulaire->checkbox("J'accepte les cookies", 'conected');
    echo "<p id='error' class='text-danger fs-2'></p>";
    $formulaire->button('info',"Commencer à tweeter !");
    $formulaire->close();
    echo "<p class='text-light fs-1 px-5'>Pour pouvoir vous connecter vous devez accepter les cookies.</p>"
?>

    <h2 class="text-info py-2 pt-10">Réactiver mon compte via mon email</h2>
    <?php 
     $formulaires = new Formulaire();
     $formulaires->open('POST', "formulaire_reactivation");
     $formulaires->input('Email','email','email_reactivate');
    echo "<p id='error2' class='text-danger fs-2'></p>";
    $formulaires->button('info',"Réactiver mon compte");
    $formulaires->close();
    ?>
</div>