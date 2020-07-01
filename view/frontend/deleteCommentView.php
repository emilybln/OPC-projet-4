<?php $title = 'Supprimer un commentaire'; ?>
<?php ob_start(); ?>

<section>
    <div class="msg_page">
        <h4>Le commentaire a bien été supprimé</h4>
        <p>Le commentaire signalé que vous avez supprimé a bien été retiré.</p>
        <form action="/index.php?action=goAdmin" method="get">
            <input type="submit" value="< Retour aux épisodes" class="back_button"/>
        </form>

    </div>
</section>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>