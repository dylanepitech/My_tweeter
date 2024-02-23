<?php
$title = "Follow";
 require_once("components/Header.php");
?>

<div class="container py-2 text-light">
    <a class='text-light' href="accueil">Retourner au fil d'actualité</a>
    <div class="row gap-2">
        <div class="col-6">
            <h2 class='py-3 text-info'><?= $countfollow ?> follower :</h2>
            <div class='flex col item-center center gap-1'>
                <?php
            foreach ($getfollow as $value) {
                echo "<div class='twitt border-1 w-full rounded-1'>";
                echo "<div class='h-4 pl-2 flex center item-center py-2 gap-3 card-follow'>";
                echo $value['pseudo'];
                echo "<a class='text-danger' href='delete_follower?id=" . $value['id_follower'] . "'>Supprimer</a>";
                echo "</div>";
                echo "</div>";
            }
            ?>
            </div>
        </div>
        <div class="col-6">
            <h2 class='py-3 text-info'><?= $countfollowing ?> follwing :</h2>

            <div class='flex col item-center center gap-1'>
                <?php
            foreach ($getfollowing as $value) {
                echo "<div class='twitt border-1 w-full rounded-1'>";
                echo "<div class='h-4 pl-2 flex center item-center py-2 gap-3 card-follow'>";
                echo $value['pseudo'];
                echo "<a class='text-danger' href='delete_following?id=" . $value['id_following'] . "'>Ne plus suivre</a>";
                echo "</div>";
                echo "</div>";
            }
            ?>
            </div>
        </div>
    </div>
</div>