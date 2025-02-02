<?php
namespace App\UI\FrontModul\Presenters;

use Nette;
use Nette\Database\Explorer;

class UserManager
{
    use Nette\SmartObject;

    private Explorer $database;

    public function __construct(Explorer $database)
    {
        $this->database = $database;
    }

    public function getAllUsers(): array
    {
        return $this->database->table('users')->fetchAll();
    }

    public function addUser(string $email, string $password, string $role): void
    {
        $this->database->table('users')->insert([
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'role' => $role == 'member',
        ]);
    }

    public function getUserByUsername(string $username)
    {
        return $this->database->table('users')->where('username', $username)->fetch();
    }
}