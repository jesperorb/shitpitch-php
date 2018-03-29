<?php

class Pitches
{
    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function selectAll()
    {
        $statement = $this->pdo->prepare(
            "SELECT p.*, COUNT(l.id) as likes
                FROM pitches AS p
                LEFT JOIN likes AS l
                    ON l.pitch_id = p.id
                GROUP BY p.id
                ORDER BY likes DESC"
        );
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function selectAllLoggedIn($user)
    {
        $statement = $this->pdo->prepare(
            "SELECT p.*, COUNT(l.id) as likes, (l2.id IS NOT NULL) AS liked
                FROM pitches AS p
                LEFT JOIN likes AS l
                    ON l.pitch_id = p.id
                LEFT JOIN likes AS l2
                    ON l2.pitch_id = p.id
                AND l2.user_id = :id
                GROUP BY liked, p.id
                ORDER BY likes DESC;"
        );
        $statement->bindParam(":id", $user["id"]);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertPitch()
    {
        try {
            $statement = $this->pdo->prepare(
                "INSERT INTO pitches
                  (title, content, actors, tags, created_by, created_at) 
                  VALUES 
                  (:title, :content, :actors, :tags, :created_by, :created_at)"
            );
            $statement->execute(array(
                'title'         => $_POST['title'],
                'content'       => $_POST['content'],
                'actors'        => $_POST['actors'],
                'tags'          => $_POST['tags'],
                'created_by'    => $_POST['user_id'],
                'created_at'    => (new DateTime())->format('Y-m-d H:i:s')

            ));
        } catch (PDOException $error) {
            echo $error->getMessage();
        };
    }

    public function deletePitch()
    {
        try {
            $statement = $this->pdo->prepare(
                "DELETE FROM pitches WHERE id=:id"
            );
            $statement->bindParam(":id", $_POST["id"], PDO::PARAM_INT);
            $statement->execute();
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }
    public function getPitch()
    {
        try {
            $statement = $this->pdo->prepare(
                "SELECT * FROM pitches WHERE id=:id"
            );
            $statement->bindParam(":id", $_GET["id"], PDO::PARAM_INT);
            $statement->execute();
            return $statement->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }
    public function editPitch()
    {
        try {
            $statement = $this->pdo->prepare(
                "UPDATE pitches
                SET content = :content, title= :title, actors = :actors, tags= :tags
                WHERE id= :id"
            );
            $statement->execute(array(
                "title"     => $_POST['title'],
                "content"   => $_POST['content'],
                "actors"    => $_POST['actors'],
                "tags"      => $_POST['tags'],
                "id"        => $_POST['id']
            ));
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    public function checkLike($user)
    {
        $statement = $this->pdo->prepare(
            "SELECT EXISTS(
              SELECT 1 
              FROM likes 
              WHERE user_id = :user_id
              AND pitch_id = :pitch_id) AS liked;"
        );
        $statement->execute(array(
            'user_id'   => $user,
            'pitch_id'  => $_POST['id']
        ));
        return $statement->fetch();
    }
    public function likePitch()
    {
        if ($this->checkLike($_POST['user_id'])[0] == '1') {
            try {
                $statement = $this->pdo->prepare(
                "DELETE FROM likes
                    WHERE user_id= :user_id
                    AND pitch_id= :pitch_id"
            );
                $statement->execute(array(
                'user_id'   => $_POST['user_id'],
                'pitch_id'  => $_POST['id']
            ));
            } catch (PDOException $error) {
                echo $error->getMessage();
            }
        } else {
            try {
                $statement = $this->pdo->prepare(
                    "INSERT INTO likes
                    (user_id, pitch_id)
                    VALUES
                    (:user_id, :pitch_id)"
                );
                $statement->execute(array(
                    'user_id'   => $_POST['user_id'],
                    'pitch_id'  => $_POST['id']
                ));
            } catch (PDOException $error) {
                echo $error->getMessage();
            }
        }
    }
}
