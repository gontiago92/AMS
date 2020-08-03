<?php


namespace App\Models;


class Comment extends Model
{
    protected $table = "comments";

    public function findAllByPost($article_id)
    {
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE article_id = :article_id ORDER BY created_at DESC");
        $query->execute(['article_id' => $article_id]);

        return $query->fetchAll();
    }

}