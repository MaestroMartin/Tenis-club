<?php

namespace App\UI\FrontModul\Presenters;

use Nette;
use App\Model\UserFacade;
use App\UI\Model\AuthorizatorFactory;
use Nette\Application\UI\Form;
use Nette\Database\Explorer;

final class UserPresenter extends Nette\Application\UI\Presenter
{
    private UserFacade $userFacade;
    private Explorer $database;

    public function __construct(UserFacade $userFacade, Explorer $database)
    {
        $this->userFacade = $userFacade;    
        $this->database = $database;

    }

    public function renderDefault(): void
    {
        $this->template->users = $this->userFacade->getAllUsers();
    }

    public function renderEdit(int $id = null): void
    {
        if ($id) {
            $this->template->editedUser = $this->database->table('users')->get($id);
        }
    }


    protected function startup(): void
{
    parent::startup();
    $acl = AuthorizatorFactory::create();
    

    $roles = $this->user->getRoles();
    $allowed = false;
    foreach ($roles as $role) {
        if ($acl->isAllowed($role, 'reservation', 'view')) {
            $allowed = true;
            break;
        }
    }
    if (!$allowed) {
        $this->flashMessage('Access denied.', 'error');
        $this->redirect('Sign:in');
    }
}

    public function createComponentAddForm(): Form
    {
        $form = new Form;
        $form->addText('first_name', 'Name:')
            ->setRequired('Please enter your Frist Name.');
        $form->addText('last_name', 'Surname:')
            ->setRequired('Please enter a Surname.');
        $form->addText('username', 'Username:')
            ->setRequired('Please enter a username.');
        $form->addText('email', 'Email:')
            ->setRequired('Please enter an email address.');
        $form->addPassword('password', 'Password:')
            ->setRequired('Please enter a password.');
        $form->addSelect('role', 'Role:', ['admin' => 'Admin', 'member' => 'Member'])
            ->setRequired('Please select a role.');
        $form->addSubmit('save', 'Save');
        $form->onSuccess[] = [$this, 'editUserFormSucceeded'];

        return $form;
    }

    public function editUserFormSucceeded(Form $form, \stdClass $values): void
    {
        $userId = $this->getParameter('userId');

        if ($userId) {
            $this->userFacade->updateUser($userId, $values);
            $this->flashMessage('User updated successfully.', 'success');
        } else {
            $this->userFacade->createUser($values);
            $this->flashMessage('User created successfully.', 'success');
        }

        $this->redirect('Home:default');
    }

    public function handleDelete(int $userId): void
    {
        $this->userFacade->deleteUser($userId, $this->getUser());
        $this->flashMessage('User deleted successfully.', 'success');
        $this->redirect('this');
    }
}
