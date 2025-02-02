<?php

namespace App\Model;

use Nette;
use Nette\Database\Explorer;
use Nette\Utils\ArrayHash;
use Nette\Security\Passwords;

use Nette\Security\SimpleIdentity;
class UserFacade
{
    use Nette\SmartObject;
    private Explorer $database;
    private Passwords $passwords;

    public function __construct(Explorer $database, Passwords $passwords)
    {
        $this->database = $database;
        $this->passwords = $passwords;
    }

    public function getAllUsers(): array
    {
        return $this->database->table('users')->fetchAll();
    }

    public function getUserById(int $userId): ?Nette\Database\Row
    {
        return $this->database->table('users')->get($userId);
    }

    public function getByEmail(string $email): ?Nette\Database\Row
    {
        return $this->database->table('users')->where('email', $email)->fetch();
    }

    public function createUser(ArrayHash $data): void
    {
        $this->database->table('users')->insert([
            'First_name' => $data->username,
            'email' => $data->email,
            'password' => $this->passwords->hash($data->password),
            'role' => $data->role == 'member',
        ]);
    }

    public function updateUser(int $userId, ArrayHash $data): void
    {
        $updateData = [
            'username' => $data->username,
            'email' => $data->email,
            'role' => $data->role,
        ];

        if (!empty($data->password)) {
            $updateData['password'] = $this->passwords->hash($data->password);
        }

        $this->database->table('users')->where('id', $userId)->update($updateData);
    }

    public function deleteUser(int $userId): void
    {
        $this->database->table('users')->where('id', $userId)->delete();
    }

    public function authenticate(string $email, string $password)
    {
        $user = $this->database->table('users')->where('email', $email)->fetch();

        if (!$user || !$this->passwords->verify($password, $user->password)) {
            throw new Nette\Security\AuthenticationException('Invalid credentials');
        }

        return new SimpleIdentity($user->id, $user->role, ['username' => $user->username, 'email' => $user->email]);
    }

    public function changePassword(int $userId, string $newPassword): void
    {
        $this->database->table('users')->where('id', $userId)->update([
            'password' => $this->passwords->hash($newPassword)
        ]);
    }

    public function resetPassword(string $email, string $newPassword): void
    {
        $user = $this->database->table('users')->where('email', $email)->fetch();

        if (!$user) {
            throw new Nette\InvalidArgumentException('User with this email does not exist.');
        }

        $this->database->table('users')->where('id', $user->id)->update([
            'password' => $this->passwords->hash($newPassword)
        ]);
    }
}
