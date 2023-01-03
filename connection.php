<?php

class Connection
{
    public PDO $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:dbname=spa;host=127.0.0.1', 'root', '');
    }

    public function insert(User $user): bool
    {
        $query = 'INSERT INTO user (email, password, usernamee, last_name)
                  VALUES (:email, :password, :username, :last_name)';

        $statement = $this->pdo->prepare($query);

        return $statement->execute([
            'email' => $user->email,
            'password' => md5($user->password . 'MY_SUPER_SALT'),
            'first_name' => $user->username,
            'last_name' => $user->lastName,
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

    public function getAll(): array
    {
        $query = 'SELECT * FROM pets JOIN user ON user.id = pets.user_id';

        $statement = $this->pdo->prepare($query);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }


    public function Insert_pets(pets $pets): bool
    {
        $query = 'INSERT INTO pets (name_pets, type_pets, user_id)
                  VALUES (:name_pets, :type_pets, :user_id)';

        $statement = $this->pdo->prepare($query);

        return $statement->execute([
            'name_pets' => $pets->name,
            'type_pets' => $pets->type,
            'user_id' => $pets->foreign_key,
        ]);
    }
    public function getAllOWNER($pets_id): array
    {
        $query = "SELECT * FROM Pets WHERE user_id = '$pets_id'";

        $statement = $this->pdo->query($query);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function delete(int $id): bool
    {
        $query = 'DELETE FROM pets
                  WHERE id = :id';

        $statement = $this->pdo->prepare($query);

        return $statement->execute([
            'id' => $id,
        ]);
    }

}