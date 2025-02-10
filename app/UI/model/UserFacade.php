<?php

namespace App\Model;

use Nette;
use Nette\Database\Explorer;
use Nette\Utils\ArrayHash;
use Nette\Security\Passwords;

use Nette\Security\SimpleIdentity;
use stdClass;

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

    public function getUserById(int $userId)
    {
        return $this->database->table('users')->get($userId);
    }

    public function getByEmail(string $email)
    {
        return $this->database->table('users')->where('email', $email)->fetch();
    }

    public function createUser(stdClass $data): void
    {
    bdump($data, 'Obsah $data v createUser'); // Debugging

    $this->database->table('users')->insert([
        'first_name' => $data->username,
        'last_name' => $data->last_name,
        'username' => $data->username,
        'email' => $data->email,
        'password' => isset($data->password) ? $this->passwords->hash($data->password) : '',
        'role' => $data->role,
        'color' => $data->color,
    ]);
    }



   public function updateUser(int $userId, stdClass $values,$currentUser): void
{
    
    $user = $this->database->table('users')->get($userId);
    if (!$user) {
        throw new \Exception("Uživatel nenalezen.");
    }

    
    $updateData = [];

    
    if (!empty($values->username)) {
        $updateData['username'] = $values->username;
    }
    
    if (!empty($values->email)) {
        $updateData['email'] = $values->email;
    }
    
    if (!empty($values->password)) {
        $updateData['password'] = $this->passwords->hash($values->password);
    }

    if (!empty($values->role) && $currentUser->isInRole('admin')) {
        $updateData['role'] = $values->role;
    }

    if (!empty($updateData)) {
        $this->database->table('users')->where('id', $userId)->update($updateData);
    }
}




    public function deleteUser(int $userId, Nette\Security\User $user): void
    {
    // Ověření, zda je uživatel přihlášen a má roli admin
    if (!$user->isLoggedIn() || !$user->isInRole('admin')) {
        throw new \Nette\Security\AuthenticationException('Only admins can delete users.');
    }

    // Smazání uživatele
    $this->database->table('users')->where('id', $userId)->delete() and $this->database->table('reservations')->where('user_id', $userId)->delete();
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
}
