<?php
$title = "Page d'accueil";
 require_once("components/Header.php");
?>
<script defer src="public/style/js/_cookie.js"></script>
<script defer src="public/style/js/_burger.js"></script>

<div class="container">
    <div class='w-vw flex start item-start text-light fixed'>
        <img src="public/style/icon/burger.png" height="30" class="pt-2 pl-2" alt="Icon_burger" id="burger">
    </div>
    <div class='nav_corp' id='nav_corp'>
        <div class='flex col center item-center gap-2'>
            <a href="inscription">Inscription</a>
            <a href="connexion">Connexion</a>
        </div>
        <img src="public/image/logo-black.png" class="img" alt="Logo_icon">
    </div>
    <div class="row">
        <div class="col-6 flex center item-center h-vh">
            <img src="public/image/aots.png" alt="">
        </div>
        <div class="col-6 col-6 flex col center item-center h-vh text-light gap-5">
            <h1 class='fs-4'>Maintenant démmarre le changement</h1>
            <div class='flex center item-center col gap-1 fs-3'>
                <p>Vous êtes deja inscrit ?</p>
                <button id="connexion" class='btn-info'>Connexion</button>
            </div>
            <p class='fs-2'>ou alors</p>
            <div class='flex center item-center col gap-1 fs-3'>
                <p>Vous êtes nouveau ?</p>
                <button id="inscription" class='btn-info'>Inscription</button>
            </div>
        </div>
    </div>
    <footer class='w-vw flex row around center item-center h-auto bg-light py-2'>
        <div class='flex col item-center center gap-1'>
            <h5 class='fs-2'>Information du site</h5>
            <a href="">Mention légale</a>
            <a href="">Plan du site</a>
        </div>
        <div class='flex col item-center center'>
            <p>Copyright 2024 OATS</p>
        </div>
        <div class='flex col item-center center gap-1'>
            <h5 class='fs-2'>Crédits</h5>
            <a href="">#Epitech</a>
            <a href="">#Webaccademie</a>
            <a href="">#NightDev83</a>
        </div>
    </footer>
    <div class="container-cookie" id="container-cookie">
        <div class="cookie-body">
            <div class="cookie-title">
                <img src="public/style/icon/cookie.png" height="80" width="80" alt="Icon cookie">
                <h2>Miam les cookies</h2>
            </div>
            <div class="flex center item-center p-3">
                <p class="">Ce site web utilise des cookies pour améliorer votre expérience de navigation et
                    personnaliser le contenu selon vos préférences. Vous pouvez choisir d'accepter ou de refuser
                    l'utilisation des cookies.</p>
            </div>
            <div class="w-full py-2">
                <div class="row screen-lg center grid-center w-full gap-3">
                    <div class="col-6">
                        <button class="btn-success" id="accepted">Accepter</button>
                    </div>
                    <div class="col-6">
                        <button class="btn-danger" id="refused">Refuser</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>