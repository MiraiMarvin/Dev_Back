<?php

class Connection
{
    public PDO $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:dbname=spydevback;host=127.0.0.1', 'root', '');
    }

    public function insert(User $user): bool
    {
        $query = 'INSERT INTO user (email, password, username, last_name,bio)
                  VALUES (:email, :password, :username, :last_name, :bio)';

        $statement = $this->pdo->prepare($query);

        return $statement->execute([
            'email' => $user->email,
            'password' => md5($user->password . 'MY_SUPER_SALT'),
            'username' => $user->username,
            'last_name' => $user->lastName,
            'bio' => $user->bio,
        ]);
    }
    public function take($email,$password): array|bool
    {
        $query = 'SELECT * FROM user WHERE email = ? AND  password = ?';

        $statement = $this->pdo->prepare($query);

        $statement->execute(
            array($email,md5($password. 'MY_SUPER_SALT'))
        );
        return $statement->fetchAll()[0];
    }

    public function getAllUser($user_id): array
    {
        $query = "SELECT * FROM user WHERE id = '$user_id'";

        $statement = $this->pdo->query($query);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllAlbum($user_id): array
    {
        $query = "SELECT * FROM album WHERE user_id = '$user_id'";

        $statement = $this->pdo->query($query);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getReallyAllUser(): array
    {
        $query = "SELECT * FROM user ";

        $statement = $this->pdo->query($query);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function insertAl(album $album): bool
    {
        $query = 'INSERT INTO album (title, status, user_id)
          VALUES (:titre, :status, :user_id)';

        $statement = $this->pdo->prepare($query);

        return $statement->execute([
            'titre' => $album->titre,
            'status' => $album->status,
            'user_id' => $album->user_id,
        ]);
    }
    public function insertFilm (film $film): bool
    {
        $query = 'INSERT INTO film (api_id, album_id)
                  VALUES (:api_id, :album_id)';

        $statement = $this->pdo->prepare($query);

        return $statement->execute([
            'api_id' => $film->api_id,
            'album_id' => $film->album_id,
        ]);
    }
    public function insertAL_SH (album_share $album_share): bool
    {
        $query = 'INSERT INTO album_share (id_receive, id_send, album_id)
                  VALUES (:id_receive, :id_send, :album_id)';

        $statement = $this->pdo->prepare($query);

        return $statement->execute([
            'id_receive' => $album_share->id_receive,
            'id_send' => $album_share->id_send,
            'album_id' => $album_share->album_id,
        ]);
    }
    public function getAllFilm($album_id): array
    {
        $query = "SELECT * FROM film WHERE album_id = '$album_id'";

        $statement = $this->pdo->query($query);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function deletefilm($myVar, $id_sup): bool
    {
        $query = "DELETE FROM film WHERE api_id = ? AND album_id = ?";
        $statement = $this->pdo->prepare($query);
        return $statement->execute([$myVar, $id_sup]);
    }
    public function receive_ALSH($receive_id): array
    {
        $query = "SELECT * FROM album_share JOIN album WHERE id_receive = '$receive_id' AND album.id = album_id";

        $statement = $this->pdo->query($query);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function TrueChange($id_rec , $albshareid): array
    {
        $query = "UPDATE album_share SET accept = TRUE WHERE id_receive = '$id_rec' AND album_id = '$albshareid'";

        $statement = $this->pdo->query($query);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function delinvite($id_rec, $albshareid): array
    {
        $query = "DELETE FROM album_share WHERE id_receive = '$id_rec' AND album_id = '$albshareid'";

        $statement = $this->pdo->query($query);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllAlbumShare($user_id): array
    {
        $query = "SELECT * FROM album_share WHERE id_receive = '$user_id' AND accept = TRUE";

        $statement = $this->pdo->query($query);
        $statement ->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAlbbyID($album): array
    {
        $query = "SELECT * FROM album WHERE id = '$album'";

        $statement = $this->pdo->query($query);
        $statement ->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC)[0];
    }
    public function PutTrueAlb($alb_id): array
    {
        $query = "UPDATE album SET status = TRUE WHERE id = '$alb_id'";

        $statement = $this->pdo->query($query);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllAlbumpublic($user_id): array
    {
        $query = "SELECT * FROM album WHERE user_id = '$user_id' AND status = FALSE";

        $statement = $this->pdo->query($query);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }






}