<?php

namespace App\UI\FrontModul\Presenters;

use Nette\Application\UI\Form;
use Nette\Security\AuthenticationException;
use App\UI\FrontModul\UserManager;

final class SignPresenter extends BasePresenter
{
    private UserManager $userManager;

    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;
    }

    protected function startup(): void
    {
        parent::startup();
        // Skip login check for SignPresenter
    }

    public function createComponentLoginForm(): Form
    {
        $form = new Form;
        $form->addText('username', 'Username:')->setRequired('Please enter your username.');
        $form->addPassword('password', 'Password:')->setRequired('Please enter your password.');
        $form->addSubmit('login', 'Login');
        $form->onSuccess[] = [$this, 'loginFormSucceeded'];
        return $form;
    }

    public function loginFormSucceeded(Form $form, \stdClass $values): void
    {
        try {
            $this->getUser()->login($values->username, $values->password);
            $this->flashMessage('Login successful!', 'success');
            $this->redirect('Home:default');
        } catch (AuthenticationException $e) {
            $this->flashMessage('Login failed: ' . $e->getMessage(), 'error');
        }
    }

    public function actionLogout(): void
    {
        $this->getUser()->logout();
        $this->flashMessage('You have been logged out.', 'info');
        $this->redirect('Sign:default');
    }
}