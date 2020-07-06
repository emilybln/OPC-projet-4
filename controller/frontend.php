<?php

class FrontendCtrl {

    private $postManager;
    private $commentManager;

    public function __construct()
    {
        $this->postManager = new PostManager();
        $this->commentManager = new CommentManager();
    }

    public function listPosts()
    {
        return $this->postManager->getPosts();
    }

    public function post()
    {
        $postWithComments = new Post();
        $postWithComments->setPost($this->postManager->getPost($_GET['id']));
        $postWithComments->setComments($this->commentManager->getComments($_GET['id']));
        return  $postWithComments;
    }

    public function addComment($postId, $author, $comment)
    {
        $this->commentManager->postComment($postId, $author, $comment);
        header('Location: index.php?action=post&id=' . $postId);
    }

    public function addPost($content)
    {
       return $this->postManager->addPost($content);
    }

    public function deletePost($id)
    {
        return $this->postManager->deletePost($id);
    }

    public function editPost($id, $content)
    {
        return $this->postManager->editPost($id, $content);
    }

    public function flagComment($id)
    {
        $this->commentManager->flagComment($id);
    }

    public function unflagComment($id)
    {
        $this->commentManager->unflagComment($id);
    }

    public function listFlagComments()
    {
        return $this->commentManager->getFlagComments();
    }

    public function deleteComment($id)
    {
        return $this->commentManager->deleteComment($id);
    }

    public function getPostEdition()
    {
        $postEdition = new Post();

        $postEdition->setPost($this->postManager->getPost($_GET['id']));
        return $postEdition;
    }

    public function getLogin()
    {
        $getLogin = new LoginManager();
        return $getLogin->getLogin($_POST['login']);
    }

}


