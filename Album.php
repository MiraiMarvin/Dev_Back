<?php
class album
{
    public function __construct(
        public string $titre,
        public int $status,
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




}
?>