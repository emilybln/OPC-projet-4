<?php $title = 'Episodes'; ?>

<?php ob_start(); ?>

<?php include("intro.php"); ?>

<section class="intro">
    <h1>Billet simple pour l'Alaska</h1>
    <p>par Jean Forteroche</p>
</section>

<?php
while ($data = $posts->fetch())
{
?>
<section>
    <div class="post">
        <div class="post_date">le <?= $data['creation_date_fr'] ?></div>
        <p><?= nl2br(htmlspecialchars_decode($data['content'])) ?></p>
        <hr />
        <div class="comment_link">
            <a href="/index.php?action=post&amp;id=<?= $data['id'] ?>">Voir les commentaires</a>
        </div>
    </div>
</section>
<?php
}
?>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>