<?php

declare(strict_types=1);

namespace App\Model;

use Nette;
use Nette\Security\Authenticator;
use Nette\Security\Identity;
use Nette\Security\AuthenticationException;

class MyAuthenticator implements Authenticator
{
    private UserFacade $userFacade;

    public function __construct(UserFacade $userFacade)
    {
        $this->userFacade = $userFacade;
    }

    /**
     * Performs an authentication.
     * @param string $username
     * @param string $password
     * @return Identity
     * @throws AuthenticationException
     */
    public function authenticate(string $username, string $password): Identity
    {
        // Fetch user by username/email
        $user = $this->userFacade->getByEmail($username);
        if (!$user) {
            throw new AuthenticationException('The email is incorrect.', self::IDENTITY_NOT_FOUND);
        }

        // Verify password
        if (!$this->userFacade->passwords->verify($password, $user->password)) {
            throw new AuthenticationException('The password is incorrect.', self::INVALID_CREDENTIAL);
        }

        // Rehash password if needed
        if ($this->userFacade->passwords->needsRehash($user->password)) {
            $this->userFacade->changePassword($user->id, $password);
        }

        // Return identity
        return new Identity(
            $user->id,
            $user->role,
            [
                'username' => $user->username,
                'email' => $user->email
            ]
        );
    }
}
