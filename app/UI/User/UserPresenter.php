<?php

namespace App\UI\User;

use Nette;
use App\Model\UserFacade;

final class UserPresenter extends Nette\Application\UI\Presenter
{
    private UserFacade $userFacade;

    public function __construct(UserFacade $userFacade)
    {
        $this->userFacade = $userFacade;
    }

    public function renderDefault(): void
    {
        $this->template->users = $this->userFacade->getAllUsers();
    }

    public function renderEdit(int $userId): void
    {
        $user = $this->userFacade->getUserById($userId);

        if (!$user) {
            $this->flashMessage('User not found.', 'error');
            $this->redirect('default');
        }

        $this->template->user = $user;
    }

    public function createComponentEditUserForm(): Nette\Application\UI\Form
    {
        $form = new Nette\Application\UI\Form;
        $form->addText('username', 'Username:')
            ->setRequired('Please enter a username.');
        $form->addText('email', 'Email:')
            ->setRequired('Please enter an email address.');
        $form->addSelect('role', 'Role:', ['admin' => 'Admin', 'member' => 'Member'])
            ->setRequired('Please select a role.');
        $form->addSubmit('save', 'Save');
        $form->onSuccess[] = [$this, 'editUserFormSucceeded'];

        return $form;
    }

    public function editUserFormSucceeded(Nette\Application\UI\Form $form, \stdClass $values): void
    {
        $userId = $this->getParameter('userId');

        if ($userId) {
            $this->userFacade->updateUser($userId, $values);
            $this->flashMessage('User updated successfully.', 'success');
        } else {
            $this->userFacade->createUser($values);
            $this->flashMessage('User created successfully.', 'success');
        }

        $this->redirect('default');
    }

    public function handleDelete(int $userId): void
    {
        $this->userFacade->deleteUser($userId);
        $this->flashMessage('User deleted successfully.', 'success');
        $this->redirect('this');
    }
}
