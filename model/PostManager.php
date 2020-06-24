<?php
class PostManager
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC');
        return $req;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();
        return $post;
    }

    public function addPost($content)
    {
        $db = $this->dbConnect();
        $newPost = $db->prepare('INSERT INTO posts(content, creation_date) VALUES(?, NOW())');
        $newPost->execute(array($content));

        return $newPost;
    }

    public function deletePost($id)
    {
        $db = $this->dbConnect();
        $newListPost = $db->prepare('DELETE FROM posts WHERE id=?') ;
        $newListPost->execute(array($id));

        return $newListPost;
    }

    public function editPost($id, $content)
    {
        $db = $this->dbConnect();
        $editPost = $db->prepare('UPDATE posts SET content = ? WHERE id = ?');
        $editPost->execute(array($content, $id));

        return $editPost;
    }

    private function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');
        return $db;
    }
}