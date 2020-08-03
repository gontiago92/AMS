<?php


namespace App\Models;


class Employee extends Model
{
    protected $table = "employees";

    public function edit($id, $title, $introduction, $content)
    {

        $sql = "UPDATE {$this->table} SET title = :title, introduction = :introduction, content = :content WHERE id = :id";
        $req = $this->pdo->prepare($sql);

        return $req->execute([
            'id' => $id,
            'title' => $title,
            'introduction' => (empty($introduction) ? null : $introduction),
            'content' => $content
        ]);
    }

    public function insert(array $values)
    {
        $query = $this->pdo->prepare("INSERT INTO {$this->table} SET title = ?, introduction = ?, content = ?, created_at = NOW()");

        // On exécute la requête en précisant le paramètre :id
        $query->execute($values);

    }

}