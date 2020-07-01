<?php $title = 'Supprimer un épisode'; ?>
<?php ob_start(); ?>

<div class="msg_page">
    <h4>L'épisode a bien été supprimé</h4>
    <p>L'épisode que vous avez supprimé a bien été retiré de votre livre</p>
    <form action="/index.php?action=goAdmin" method="get">
        <input type="submit" value="< Retour aux épisodes" class="back_button"/>
    </form>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>