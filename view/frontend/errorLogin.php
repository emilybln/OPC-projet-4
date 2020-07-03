<?php $title = 'Erreur login'; ?>
<?php ob_start(); ?>

<div class="msg_page">
    <h4>OUPS...</h4>
    <p><?php echo $phrase ?></p>
    <p><a class="back_button" href="/index.php">< Retour à la page d'accueil</a></p>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
