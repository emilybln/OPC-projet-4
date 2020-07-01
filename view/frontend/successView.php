<?php $title = 'Ajouter un épisode'; ?>
<?php ob_start(); ?>

<div class="msg_page">
    <h4>Un épisode de plus !</h4>
    <p>Le nouvel épisode que vous avez rédigé a bien été ajouté à votre roman</p>
    <form action="/index.php?action=goAdmin" method="get">
        <input type="submit" value="< Retour aux épisodes" class="back_button"/>
    </form></div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>