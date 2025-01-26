<?php

namespace App\UI\Model;

use Nette\Security\SimpleIdentity;
use App\UI\Model\UserFacade;
use Nette\Security\Authenticator;
use Nette\Security\IIdentity;
use Nette\Security\Passwords;
use Nette\Security\AuthenticationException;

class MyAuthenticator implements Authenticator
{
    private UserFacade $userFacade;
    private RoleFacade $roleFacade;
    private Passwords $passwords;

    public function __construct(
        UserFacade $userFacade,
        RoleFacade $roleFacade,
        Passwords $passwords
    ) {
        $this->userFacade = $userFacade;
        $this->roleFacade = $roleFacade;
        $this->passwords = $passwords;
    }

    public function authenticate(string $user, string $password): IIdentity
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

        // Ověření, zda heslo nevyžaduje rehash
        if ($this->passwords->needsRehash($row->password)) {
            $newHash = $this->passwords->hash($password);
            $this->userFacade->updatePassword($row->id, $newHash);
        }

        // Připravení dat identity
        $userData = $row->toArray();
        unset($userData['password']);

        return new SimpleIdentity(
            $row->id,
            $this->roleFacade->findAllByUserIdAsEntity($row->id), // Role uživatele
            $userData // Další data uživatele
        );
    }
}
