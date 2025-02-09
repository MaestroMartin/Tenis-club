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
        $form->addEmail('email', 'Email:')
            ->setRequired('Please enter an email address.');
        $form->addPassword('password', 'Password:')
            ->setRequired('Please enter a password.');
        $form->addSelect('role', 'Role:', ['admin' => 'Admin', 'member' => 'Member'])
            ->setRequired('Please select a role.');
        $form->addColor('color', 'Color:')
            ->setRequired('Please select a color.')
            ->setDefaultValue('#3C8ED7');;
                
        $form->addSubmit('save', 'Save');
        $form->onSuccess[] = [$this, 'addUserFormSucceeded'];

        return $form;
    }

    public function createComponentEditForm(): Form
    {
        $form = new Form;
        $form->addText('username', 'Username:')
             ->setRequired('Please enter a username.')
             ->setHtmlAttribute('class', 'form-control'); // Přidá Bootstrap třídu
        $form->addEmail('email', 'Email:')
             ->setRequired('Please enter an email.')
             ->setHtmlAttribute('class', 'form-control');
        $form->addPassword('password', 'Password:')
             ->setRequired('Please enter a password.')
             ->setHtmlAttribute('class', 'form-control');
        $form->addSelect('role', 'Role:', ['admin' => 'Admin', 'member' => 'Member'])
             ->setRequired('Please select a role.')
             ->setHtmlAttribute('class', 'form-control');
        $form->addSubmit('save', 'Save Changes')
            ->setHtmlAttribute('class', 'btn btn-success');

                
        
        $form->onSuccess[] = [$this, 'editUserFormSucceeded'];

        return $form;
    }



    public function editUserFormSucceeded(Form $form, \stdClass $values): void
    {
        $userId = $this->getParameter('id');
        bdump($userId, 'userId');
        if ($userId) {
            $this->userFacade->updateUser($userId, $values, $this->getUser());
            $this->flashMessage('User updated successfully.', 'success');
            $this->redirect('User:default');
        } else {
            $this->flashMessage('User not found.', 'error');
            $this->redirect('User:default');

            
        }

    }
    public function addUserFormSucceeded(Form $form, \stdClass $data): void
     {
        $this->userFacade->createUser($data);
        $this->flashMessage('User created successfully.', 'success');
        $this->redirect('User:default');
     }
        
    

    public function handleDelete(int $userId): void
    {
        $this->userFacade->deleteUser($userId, $this->getUser());
        $this->flashMessage('User deleted successfully.', 'success');
        $this->redirect('this');
    }
}
