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
        elseif ($_GET['action'] == 'addPost') {
            if (isset($_POST['content']) AND !empty($_POST['content'])) {
                try {
                    $frontendCtr->addPost($_POST['content']);
                    return require('view/frontend/successView.php');
                }
                catch(Exception $e) {
                    throw new Exception('Aucun contenu trouvé');
                }
            }
            else {
                // Autre exception
                throw new Exception('Aucun contenu trouvé');
            }
        }
        elseif ($_GET['action'] == 'deletePost') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $frontendCtr->deletePost($_GET['id']);
                return require('view/frontend/deleteView.php');
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }

        elseif ($_GET['action'] == 'editPost') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $frontendCtr->editPost($_GET['id'], $_POST['content']);
                return require('view/frontend/successView.php');
            }
            else {
                throw new Exception('Impossible de modifier le post');
            }
        }

        elseif ($_GET['action'] == 'flagComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $frontendCtr->flagComment($_GET['id']);
            }
            else {
                throw new Exception('le commentaire n\'a pas pu être signalé');
            }
        }

        elseif ($_GET['action'] == 'unflagComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $frontendCtr->unflagComment($_GET['id']);
            }
            else {
                throw new Exception('le commentaire n\'a pas pu être approuvé');
            }
        }

        elseif ($_GET['action'] == 'deleteComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $frontendCtr->deleteComment($_GET['id']);
                return require('view/frontend/adminView.php');
            }
            else {
                throw new Exception('Aucun identifiant de commentaire trouvé');
            }
        }

        elseif ($_GET['action'] == 'getPostEdition') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $postEdition = $frontendCtr->getPostEdition();
                return require('view/frontend/editionView.php');
            }
            else {
                throw new Exception('Aucun identifiant de commentaire trouvé');
            }
        }
    }


    if (isset($_POST['login']) AND isset($_POST['password'])) {
        if ($_POST['password'] == "123") {
           // $posts = $frontendCtr->listPosts();
            return require('view/frontend/adminView.php');
        }
        else {
            return require('view/frontend/errorLogin.php');
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
