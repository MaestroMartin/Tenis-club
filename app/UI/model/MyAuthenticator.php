<?php



use Nette;
use Nette\Security\SimpleIdentity;
use Nette\Security\AuthenticationException;
use Tracy\Debugger;
use Nette\Security\Authenticator;

class MyAuthenticator implements Authenticator
{
    public function __construct(
        private Nette\Database\Explorer $database,
        private Nette\Security\Passwords $passwords
    ) {}

    public function authenticate(string $email, string $password): SimpleIdentity
    {
        $row = $this->database->table('users')
            ->where('email', $email)
            ->fetch();

        if (!$row) {
            throw new AuthenticationException('User not found.');
        }

        // Ověření hesla pomocí bcrypt (password_verify)
        if (!$this->passwords->verify($password, $row->password)) {
            Debugger::barDump($password, 'Zadané heslo');
            Debugger::barDump($row->password, 'Hash z databáze');
            throw new AuthenticationException('Invalid password.');
        }

        return new SimpleIdentity(
            $row->id,
            $row->role, // nebo pole více rolí
            ['name' => $row->username]
        );
    }
}