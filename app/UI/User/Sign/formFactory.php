<?php

declare(strict_types=1);


namespace App\UI\User\Sign;

use App\Core\FormFactory as CoreFormFactory;
use Exception;
use Nette\Application\UI\Form;
use Nette\SmartObject;
use stdClass;
use Nette\security\User;
use Tracy\Debugger;
use Nette\Security\AuthenticationException;
use Nette\Security\SimpleIdentity;

class FormFactory
{   
    use SmartObject;

    public function __construct(
        private User $user,
        private CoreFormFactory $formFactory,
        private \App\UI\User\Sign\ControlFactory $signInFormFactory
    ){}

    public function create(): Form{
        
        $form = $this->formFactory->create();

        $form->getElementPrototype()->setAttribute('autocomplete', 'email');
    
        $form->addEmail('email', 'Váš E-mail:')
            ->setRequired('Prosím vyplňte svůj E-mail.')
            ->addRule($form::EMAIL, 'Zadejte platný e-mail.');
    
        $form->addPassword('password', 'Heslo:')
            ->setRequired('Prosím vyplňte své heslo.')
            ->addRule($form::MIN_LENGTH, 'Heslo musí mít alespoň 8 znaků.', 4);
    
        $form->addSubmit('send', 'Přihlásit');
    
        $form->onSuccess[] = [$this, 'onSuccess'];
    
        Debugger::barDump($form, 'Vytvořený formulář');
    
        return $form;
    }

    public function onSuccess(Form $form, stdClass $values): void
    {
        Debugger::barDump($values, 'Hodnoty z formuláře');
        
        try {
            $this->user->login($values->email, $values->password);
            Debugger::barDump('Uživatel úspěšně přihlášen', 'Login Status');
        } catch (Exception $e) {
            Debugger::barDump($e->getMessage(), 'Login Error');
            $form->addError('Nesprávné přihlašovací jméno nebo heslo.');
        }
        
       
    }

    
    
}
