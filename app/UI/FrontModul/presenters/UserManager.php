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
        return $this->database->table('user')->fetchAll();
    }

    public function addUser(string $username, string $password, string $role): void
    {
        $this->database->table('user')->insert([
            'username' => $username,
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'role' => $role,
        ]);
    }

    public function getUserByUsername(string $username)
    {
        return $this->database->table('user')->where('username', $username)->fetch();
    }
}