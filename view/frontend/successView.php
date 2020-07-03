<?php $title = 'Ajouter un épisode'; ?>
<?php ob_start(); ?>

<section>
    <div class="msg_page">
        <h4>Et un nouvel épisode !</h4>
        <p>L'épisode que vous venez de rédiger a bien été ajouté à votre roman</p>
        <a href="/index.php?action=goAdmin" class="back_button">< Retour à l'espace membre</a>
    </div>
</section>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>