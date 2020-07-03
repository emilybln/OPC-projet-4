<?php
require('autoload.php');
session_start();

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

        elseif ($_GET['action'] == 'deletePost') {
            if (isset($_GET['id']) && $_GET['id'] > 0 && !is_null($_SESSION['login']) ) {
                $frontendCtr->deletePost($_GET['id']);
                return require('view/frontend/deleteView.php');
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }


        elseif ($_GET['action'] == 'flagComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $frontendCtr->flagComment($_GET['id']);
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }

        elseif ($_GET['action'] == 'unflagComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $frontendCtr->unflagComment($_GET['id']);
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }

        elseif ($_GET['action'] == 'deleteComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $frontendCtr->deleteComment($_GET['id']);
                return require('view/frontend/deleteCommentView.php');
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }

        elseif ($_GET['action'] == 'getPostEdition') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $postEdition = $frontendCtr->getPostEdition();
                return require('view/frontend/editionView.php');
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }

        elseif ($_GET['action'] == 'logout') {
            if (isset($_SESSION['login'])) {
                unset($_SESSION["id"]);
                unset($_SESSION["login"]);
                unset($_SESSION["password"]);
                return require('view/frontend/listPostsView.php');
            }
            else {
                $phrase = "Désolé, nous n'avons trouvé aucune session administrateur en cours.";
                return require('view/frontend/errorLogin.php');
            }
        }

        elseif ($_GET['action'] == 'goAdmin') {
            if (isset($_SESSION['login'])) {
                return require('view/frontend/adminView.php');
            }
            else {
                $phrase = "Désolé, nous n'avons trouvé aucune session administrateur en cours.";
                return require('view/frontend/errorLogin.php');
            }
        }
    }

    if(isset($_POST['addComment'])){
        if (isset($_POST['id']) && $_POST['id'] > 0) {
            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                $frontendCtr->addComment($_POST['id'], $_POST['author'], $_POST['comment']);
            }
            else {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        }
        else {
            throw new Exception('Aucun identifiant de billet envoyé');
        }
    }

    if(isset($_POST['editPost'])){
        if (isset($_POST['id']) && $_POST['id'] > 0) {
            $frontendCtr->editPost($_POST['id'], $_POST['content']);
            return require('view/frontend/successView.php');
        }
        else {
            throw new Exception('Aucun identifiant de billet envoyé');
        }
    }

    if(isset($_POST['addPost'])){
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
            throw new Exception('Aucun contenu trouvé');
        }
    }


    if (isset($_POST['login']) AND isset($_POST['password'])) {
        $getLogin = $frontendCtr->getLogin();

        if (!$getLogin) {
            $phrase = "L'identifiant et le mot de passe que vous avez renseignés sont incorrects, veuillez réessayer.";
            return require('view/frontend/errorLogin.php');
        }
        else {
            $isPasswordCorrect = password_verify($_POST['password'], $getLogin['password']);
            if ($isPasswordCorrect) {
                $_SESSION['id'] = $getLogin['id'];
                $_SESSION['login'] = $getLogin['login'];
                return require('view/frontend/adminView.php');
            }
            else {
                $phrase = "L'identifiant et le mot de passe que vous avez renseignés sont incorrects, veuillez réessayer.";
                return require('view/frontend/errorLogin.php');
            }
        }
    }

    else {
        return require('view/frontend/listPostsView.php');
    }

}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
