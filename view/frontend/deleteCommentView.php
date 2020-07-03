<?php $title = 'Supprimer un commentaire'; ?>
<?php ob_start(); ?>

<section>
    <div class="msg_page">
        <h4>Le commentaire a bien été supprimé</h4>
        <p>Le commentaire signalé que vous avez supprimé a bien été retiré.</p>
        <a href="/index.php?action=goAdmin" class="back_button">< Retour à l'espace membre</a>
    </div>
</section>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
