<?php

declare(strict_types=1);

namespace App\UI\Model;

use Nette\SmartObject;
use  Nette\Database\Explorer;
use Nette\Database\Row;

class UserManager
{
    use SmartObject;

    private Explorer $database;

    public function __construct(Explorer $database)
    {
        $this->database = $database;
    }

    public function getAllUsers(): array
    {
        return $this->database->table('users')->fetchAll();
    }

    public function deleteUser(int $userId): void
    {
        $this->database->table('users')->where('id', $userId)->delete();
    }

    public function getUserById(int $userId): ?Row
    {
        return $this->database->table('users')->get($userId);
    }

    
}
