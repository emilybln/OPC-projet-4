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

    public function deletePost($id)
    {
        $postManager = new PostManager();
        return $postManager->deletePost($id);
    }

    public function editPost($id, $content)
    {
        $postManager = new PostManager();
        return $postManager->editPost($id, $content);
    }

    public function flagComment($id)
    {
        $commentManager = new CommentManager();
        $commentManager->flagComment($id);
    }

    public function unflagComment($id)
    {
        $commentManager = new CommentManager();
        $commentManager->unflagComment($id);
    }

    public function listFlagComments()
    {
        $commentManager = new CommentManager();
        return $commentManager->getFlagComments();
    }

    public function deleteComment($id)
    {
        $commentManager = new CommentManager();
        return $commentManager->deleteComment($id);
    }

    public function getPostEdition()
    {
        $postManager = new PostManager();
        $postEdition = new Post();

        $postEdition->setPost($postManager->getPost($_GET['id']));
        return $postEdition;
    }



}


