<?php
require('autoload.php');

try {
    $frontendCtr = new FrontendCtrl();
    $posts = $frontendCtr->listPosts();

    if (isset($_GET['action'])) {
        if  ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $postWithComment = $frontendCtr->post();
                return require('view/frontend/PostView.php');
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    $frontendCtr->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    // Autre exception
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                // Autre exception
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
    }

    if (isset($_POST['action'])) {
        if ($_POST['action'] == 'addPost') {
            if (isset($_POST['content']) AND !empty($_POST['content'])) {
                $frontendCtr->addPost($_POST['content']);
            }
            else {
                // Autre exception
                throw new Exception('Aucun contenu trouvé');
            }
        }
    }

    if (isset($_POST['login']) AND isset($_POST['password'])) {
        if ($_POST['password'] == "123") {
           // $posts = $frontendCtr->listPosts();
            return require ('view/frontend/adminView.php');
        }
        else {
            return require ('view/frontend/errorLogin.php');
        }
    }

    else {
        //$posts = $frontendCtr->listPosts();
        return require('view/frontend/listPostsView.php');
    }

}
catch(Exception $e) { // S'il y a eu une erreur, alors...
    echo 'Erreur : ' . $e->getMessage();
}
