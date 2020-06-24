<?php $title = 'Billet simple pour l\'Alaska'; ?>

<?php include("intro.php"); ?>

<?php ob_start(); ?>


    <section>
        <a class="back_button" href="/index.php">< Retour</a>

        <div class="post">
            <div class="post_date">le <?= $postWithComment->getPost()['creation_date_fr'] ?></div>
            <p>
                <?= nl2br(htmlspecialchars($postWithComment->getPost()['content'])) ?>
            </p>
        </div>
    </section>

    <section>
        <div class="comment_post">
            <h2>Commentaires</h2>
            <form action="/index.php?action=addComment&amp;id=<?= $postWithComment->getPost()['id'] ?>" method="post">
                <div class="comment_field">
                    <label for="author">Pseudo</label><br />
                    <input class="input_comment" type="text" id="author" name="author" />
                </div>
                <div class="comment_field">
                    <label for="comment">Commentaire</label><br />
                    <textarea class="input_comment" id="comment" name="comment"></textarea>
                </div>
                <div class="comment_button">
                    <input type="submit" value="Poster" />
                </div>
            </form>


            <?php
            while ($comment = $postWithComment->getComments($postWithComment->getPost()['id'])->fetch())
            {
                ?>
                <div class="comment">
                <p id="comment_author"><?= htmlspecialchars($comment['author']) ?></p>
                <p id="comment_date">le <?= $comment['comment_date_fr'] ?></p>
                <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
                <div class="align_button">
                    <a href="/index.php?action=flagComment&amp;id=<?= $comment['id'] ?>">Signaler</a>
                </div>
                <hr>
                </div>
                <?php
            }
            ?>
        </div>
    </section>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>