<?php $title = 'Espace Membre'; ?>

<?php ob_start(); ?>
<?php include("intro.php"); ?>

    <section>
        <h1>Bienvenue <?php echo $_SESSION['login'] ?></h1>
        <a class="back_button" href="/index.php">< Retour à la page d'accueil</a>
    </section>

    <section>
        <div class="background_section">
        <h3>Commentaires signalés</h3>

        <?php
        try {
            $flagComments = $frontendCtr->listFlagComments();
        }
        catch (Exception $e) {
            http_redirect('/index.php');
        }
        while ($comments = $flagComments->fetch())
        {
        ?>
            <div class="comment">
                <p id="comment_author"><?= htmlspecialchars($comments['author']) ?></p>
                <p id="comment_date">le <?= $comments['comment_date_fr'] ?></p>
                <p><?= nl2br(htmlspecialchars($comments['comment'])) ?></p>
                <div class="align_button">
                    <a href="/index.php?action=deleteComment&amp;id=<?= $comments['id'] ?>">Supprimer</a>
                    <a href="/index.php?action=unflagComment&amp;id=<?= $comments['id'] ?>">Accepter</a>
                </div>
                <hr>
            </div>
        <?php
        }
        ?>
        </div>
    </section>

    <section>
        <div class="background_section">
            <h3>Nouvel épisode</h3>
            <form action="/index.php" method="post">
                <textarea id="mytextarea" name="content"></textarea>
                <div class="comment_button">
                    <button type="submit" name="addPost" value="submit">Poster</button>
                </div>
            </form>
        </div>
    </section>

    <div>

    <?php
        while ($data = $posts->fetch())
        {
    ?>
    <section>
        <div class="post">
            <div class="post_date">le <?= $data['creation_date_fr'] ?></div>
            <p><?= nl2br(htmlspecialchars_decode($data['content'])) ?></p>
            <hr>
            <div class="align_button">
                <a href="/index.php?action=getPostEdition&amp;id=<?= $data['id'] ?>">Modifier</a>
                <a href="/index.php?action=deletePost&amp;id=<?= $data['id'] ?>">Supprimer</a>
            </div>
        </div>
    </section>
    <?php
    }
    ?>
    </div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>


