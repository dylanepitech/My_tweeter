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
                    <a class="text-light" href='profil'>Profile</a>
                </div>
                <div class='flex row beewtween item-center w-auto rounded-3 h-4 fs-2 gap-2 px-1 base' id="base">
                    <img src="public/style/icon/follow.png" height="30" width="30" alt="follower-icon">
                    <a class='text-light' href='follow'>Follower</a>
                </div>
                <div class='flex row beewtween item-center w-auto rounded-3 h-4 fs-2 gap-2 px-1 base' id="base">
                    <img src="public/style/icon/message.png" height="30" width="30" alt="message_icon">
                    <p>Messages</p>
                </div>
                <div class='flex row beewtween item-center w-auto rounded-3 h-4 fs-2 gap-2 px-1 base' id="base">
                    <img src="public/style/icon/deconnexion.png" height="30" width="30" alt="message_icon">
                    <a href="deconnexion" class='text-danger'>Deconexion</a>
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
        <div class="col-4-9 w-full">
            <div class='flex col item-center center gap-1'>
                <div class='flex col center item-center gap-1 p-2 w-full'>
                    <img src="public/image/aots.png" height="50" width="50" alt="">
                    <form method="POST" id='twitt' enctype="multipart/form-data">
                        <input type="text" id='content' name='content'>
                        <p class='fs-1 text-info' id='size'></p>
                        <input type="file" name='file' id='file'>
                        <button class='btn-dark'>Twitter</button>
                    </form>
                </div>
                <?php foreach ($result_post as $post): ?>
                <div class="twitt border-1 w-full rounded-1 pt-2">
                    <?php if($post['id_user'] == $_COOKIE['user_id']): ?>
                    <div class='h1 pr-2 flex end item-center'>
                        <a class="text-danger" href="">X</a>
                    </div>
                    <?php endif; ?>
                    <div class='h-4 pl-2 flex start item-center py-2 gap-2'>
                        <img src="public/image/aots.png" height="50" width="50" alt="">
                        <h3 class='text-info'><?php echo $post['user_pseudo']; ?></h3>
                    </div>
                    <p class='p-2'>
                        <?php echo $post['content']; ?>
                    </p>
                    <?php if (!empty($post['image'])): ?>
                    <img src="<?php echo $post['image']; ?>" class="img" alt="image">
                    <?php endif; ?>
                    <div class='flex around item-center center h-4 py-2 div-like row'>
                        <button class='like-button btn-dark'
                            data-post-id='<?= $post['id'] ?>'><?= $post['like_count'] ?>
                            j'aime</button>
                        <a class='text-light' href="">Comment</a>
                        <a class='text-light' href="">Partage</a>
                    </div>
                    <p>Poster le: <?= $post['date'] ?></p>
                </div>
                <?php endforeach; ?>


            </div>
        </div>
        <div class=" col-2 flex item-center center col">
        </div>
    </div>
</div>