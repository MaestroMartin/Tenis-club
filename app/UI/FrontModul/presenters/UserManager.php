<?php
namespace App\UI\FrontModul\Presenters;

use Nette;
use Nette\Database\Explorer;
use stdClass;

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

    public function addUser(string $first_name,string $last_name,string $username,string $email, string $password, string $role, int $color): void
    {
        $this->database->table('users')->insert([
            'first_name' => $first_name,
            'last_name' => $last_name,
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'role' => $role,
            'color' => $color,

            
        ]);
    }

    public function getUserByUsername(string $username)
    {
        return $this->database->table('users')->where('username', $username)->fetch();
    }

    public function updateUser(int $userId, string $username, string $email, string $password, string $role): void
    {
        $this->database->table('users')->where('id', $userId)->update([
            'username' => $username,
            'email' => $email,
            'password' => password_hash( $password, PASSWORD_DEFAULT),
            'role' => $role,
        ]);
        
    }
}