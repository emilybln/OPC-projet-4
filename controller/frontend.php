<?php

class FrontendCtrl {

    public function listPosts()
    {
        $postManager = new PostManager();
        return $postManager->getPosts();
    }

    public function post()
    {
        $postManager = new PostManager();
        $commentManager = new CommentManager();

        $postWithComments = new Post();
        $postWithComments->setPost($postManager->getPost($_GET['id']));
        $postWithComments->setComments($commentManager->getComments($_GET['id']));
        return  $postWithComments;
        //TODO : renommer getComments en getCommentsByPostId
    }

    public function addComment($postId, $author, $comment)
    {
        $commentManager = new CommentManager();
        $newComment = $commentManager->postComment($postId, $author, $comment);

        if ($newComment === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        }
        else {
            header('Location: index.php?action=post&id=' . $postId);
        }
    }

    public function addPost($content)
    {
        $postManager = new PostManager();
       return $postManager->addPost($content);
    }
}


