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
    <script src="https://cdn.tiny.cloud/1/15l6thbmw3na2g5o4q1the7xhujfj626bf129spibzwoar8j/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#content'
        });
    </script>

</head>


<body>
    <section>
        <h1>Bienvenue Jean !</h1>
        <a class="back_button" href="index.php">< Retour à la page d'accueil</a>
    </section>

    <section>
        <h3>Commentaires signalés</h3>
    </section>

    <section>
        <h3>Nouvel épisode</h3>
        <form action="addPost" method="post">
            <textarea id="content"></textarea>
        </form>
        <div class="comment_button">
            <input type="submit" value="Poster" />
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
            </p>

        </div>
    </section>
<?php
}
?>
</div>






</body>
</html>