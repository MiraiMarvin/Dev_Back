<?php
class album
{
    public function __construct(
        public string $titre,
        public bool $status,
        public int $user_id,

    )
    {
    }

    public function verifyAlbum(): bool
    {
        $isValid = true;

        if ($this->titre === '' ) {
            $isValid = false;
        }
        return $isValid;
    }



    public function insertAl(album $album): bool
    {
        $query = 'INSERT INTO album (title, status, user_id)
                  VALUES (:titre, :private, :id)';

        $statement = $this->pdo->prepare($query);

        return $statement->execute([
            'title' => $album->titre,
            'status' => $album->status,
            'user_id' => $album->user_id,
        ]);
    }
}
?>