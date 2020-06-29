<?php
class CommentManager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr, flag FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $newComment = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date, flag) VALUES(?, ?, ?, NOW(), 0)');
        $newComment->execute(array($postId, $author, $comment));

        return $newComment;
    }

    public function deleteComment($id)
    {
        $db = $this->dbConnect();
        $newListComments = $db->prepare('DELETE FROM comments WHERE id=?') ;
        $newListComments->execute(array($id));

        return $newListComments;
    }

    public function flagComment($id)
    {
        $db = $this->dbConnect();
        $flagComment = $db->prepare('UPDATE comments SET flag = ? WHERE id = ?');
        $flagComment->execute(array(1, $id));

        return $flagComment;
    }

    public function unflagComment($id)
    {
        $db = $this->dbConnect();
        $unflagComment = $db->prepare('UPDATE comments SET flag = ? WHERE id = ?');
        $unflagComment->execute(array(0, $id));

        return $unflagComment;
    }

    public function getFlagComments()
    {
        $db = $this->dbConnect();
        return $db->query('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr, flag FROM comments WHERE flag = 1 ORDER BY comment_date DESC');
    }

    private function dbConnect()
    {
        return new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');
    }
}