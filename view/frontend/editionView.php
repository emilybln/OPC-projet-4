<?php $title = 'Modifier un épisode'; ?>

<?php ob_start(); ?>

<section>
    <h1>Editer un épisode</h1>
    <a href="/index.php?action=goAdmin" class="back_button">< Retour à l'espace membre</a>
</section>

<section>
    <div class="background_section">
        <form action="/index.php" method="post">
            <textarea id="mytextarea" name="content">
                <?= nl2br(htmlspecialchars($postEdition->getPost()['content'])) ?>
            </textarea>
            <input type="text" value="<?= $postEdition->getPost()['id'] ?>" name="id" style="display: none"/>
            <div class="comment_button">
                <button type="submit" name="editPost" value="submit">Modifier</button>
            </div>
        </form>
    </div>

</section>


<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>

