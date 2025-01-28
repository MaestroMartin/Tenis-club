<?php

namespace App\UI\Model;

use Nette\Security\IAuthenticator;
use Nette\Security\SimpleIdentity;
use App\Model\UserFacade;
use Nette\Security\Authenticator;
use Nette\Security\IIdentity;
use Nette\Security\Passwords;
use Nette\Security\AuthenticationException;

class MyAuthenticator implements Authenticator
{
    private UserFacade $userFacade;
    private Passwords $passwords;

    public function __construct(UserFacade $userFacade, Passwords $passwords)
    {
        $this->userFacade = $userFacade;
        $this->passwords = $passwords;
    }

    public function authenticate(string $user, string $password):IIdentity
    {
        // Získání uživatele podle e-mailu
        $row = $this->userFacade->getByEmail($user);

        if (!$row) {
            throw new AuthenticationException('User not found.');
        }

        // Ověření hesla
        if (!$this->passwords->verify($password, $row->password)) {
            throw new AuthenticationException('Invalid password.');
        }

        // Použití role jako jednoduchého stringu
        $role = $row->role ?? 'guest'; // Pokud role neexistuje, použije se "user"

        return new SimpleIdentity($row->id, $role);
    }
}
