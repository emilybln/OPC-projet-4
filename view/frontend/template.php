<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="name" content="blog de Jean Foreroche"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?= $title ?></title>
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
        <?= $content ?>
    </body>
</html>