<?php $title = 'Billet simple pour l\'Alaska'; ?>

<?php include("intro.php"); ?>

<?php ob_start(); ?>

<?php
while ($data = $posts->fetch())
{
    ?>
    <section>
        <div class="post">
            <div class="post_date">le <?= $data['creation_date_fr'] ?></div>

            <p>
                <?= nl2br(htmlspecialchars($data['content'])) ?>
                <hr>
                <div class="comment_link"><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Voir les commentaires</a></div>
            </p>

        </div>
    </section>
<?php
}
?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>