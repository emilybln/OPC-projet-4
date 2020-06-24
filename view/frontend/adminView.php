<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="name" content="blog de Jean Foreroche"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Espace membre</title>
    <link href="/public/css/style.css" rel="stylesheet" />
    <link rel="icon" type="image/png" href="/public/images/favicon.png" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">

    <script src="https://cdn.tiny.cloud/1/15l6thbmw3na2g5o4q1the7xhujfj626bf129spibzwoar8j/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea'
        });
    </script>

</head>


<body>

    <section>
        <h1>Bienvenue!</h1>
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
        <form action="/index.php?action=addPost" method="post">
            <textarea id="mytextarea" name="content"></textarea>
        <div class="comment_button">
            <input type="submit" value="Poster"/>
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

            <p>
                <?= nl2br(htmlspecialchars($data['content'])) ?>
                <hr>
                <div>
                    <div class="alert_button"><a href="/index.php?action=getPostEdition&amp;id=<?= $data['id'] ?>">Modifier</a></div>
                    <div class="alert_button"><a href="/index.php?action=deletePost&amp;id=<?= $data['id'] ?>">Supprimer</a></div>
                </div>
            </p>

        </div>
    </section>
<?php
}
?>
</div>


</body>
</html>

