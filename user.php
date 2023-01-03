<?php
class User
{
    public function __construct(
        public string $email,
        public string $password,
        public string $username,
        public string $lastName
    )
    {
    }

    public function verify(): bool
    {
        $isValid = true;

        if ($this->email === '' || $this->username === '' || $this->lastName === '') {
            $isValid = false;
        }
        return $isValid;
    }
}
?>