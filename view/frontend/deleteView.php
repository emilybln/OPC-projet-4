<?php $title = 'Supprimer un épisode'; ?>
<?php ob_start(); ?>

<section>
    <div class="msg_page">
        <h4>L'épisode a bien été supprimé</h4>
        <p>L'épisode que vous avez supprimé a bien été retiré de votre roman</p>
        <a href="/index.php?action=goAdmin" class="back_button">< Retour à l'espace membre</a>
    </div>
</section>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>