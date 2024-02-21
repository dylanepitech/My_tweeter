<?php
$title = "Page d'accueil";
 require_once("components/Header.php")
?>
<script defer src="js/Accueil.js"></script>
<style>
body {
    background-color: black !important;
}
</style>

<div class="container text-light">
    <div class="row">
        <div class="col-2">
            <div class='flex col start item-start h-vh fixed gap-3 pt-3'>
                <img src="public/image/aots.png" height="70" width="70" alt="oats_logo">
                <div class='flex row beewtween item-center w-auto rounded-3 h-4 fs-2 gap-2 px-1 base' id="base">
                    <img src="public/style/icon/home.png" height="30" width="30" alt="home_icon">
                    <p>Home</p>
                </div>
                <div class='flex row beewtween item-center w-auto rounded-3 h-4 fs-2 gap-2 px-1 base' id="base">
                    <img src="public/style/icon/search.png" height="30" width="30" alt="explore_icon">
                    <p>Explore</p>
                </div>
                <div class='flex row beewtween item-center w-auto rounded-3 h-4 fs-2 gap-2 px-1 base' id="base">
                    <img src="public/style/icon/notification.png" height="30" width="30" alt="notification_icon">
                    <p>Notification</p>
                </div>
                <div class='flex row beewtween item-center w-auto rounded-3 h-4 fs-2 gap-2 px-1 base' id="base">
                    <img src="public/style/icon/profile.png" height="30" width="30" alt="profile_icon">
                    <p>Profile</p>
                </div>
                <div class='flex row beewtween item-center w-auto rounded-3 h-4 fs-2 gap-2 px-1 base' id="base">
                    <img src="public/style/icon/follow.png" height="30" width="30" alt="follower-icon">
                    <p>Follower</p>
                </div>
                <div class='flex row beewtween item-center w-auto rounded-3 h-4 fs-2 gap-2 px-1 base' id="base">
                    <img src="public/style/icon/message.png" height="30" width="30" alt="message_icon">
                    <p>Messages</p>
                </div>
                <div class='flex row beewtween item-center w-10 h-auto gap-2 fs-2'>
                    <button class='btn-info fs-2 h-4'>Post</button>
                </div>
                <div class='flex row beewtween item-center w-auto rounded-3 h-auto fs-2 gap-2 px-1 py-1 mt-15 base'
                    id="base">
                    <img src="public/image/aots.png" height="50" width="50" alt="message_icon">
                    <div class='flex col start item-center'>
                        <p class='text-light'>
                            <?php echo $_COOKIE['user_pseudo']; ?>
                        </p>
                        <p class='text-info'>
                            <?php echo '@'.$_COOKIE['user_pseudo']; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-7">
            <div class="alert-light"></div>
        </div>
        <div class="col-3">
            <div class="alert-warning"></div>
        </div>
        <div class="col-3">
            <div class="alert-info"></div>
        </div>
    </div>
</div>