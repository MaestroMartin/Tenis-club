<?php

declare(strict_types=1);

namespace App\UI\FrontModul\Presenters;


use Nette\Application\UI\Presenter;
use App\UI\Model\AuthorizatorFactory;

// BasePresenter
abstract class BasePresenter extends Presenter
{
    protected function startup(): void
    {
        parent::startup();
        $acl = AuthorizatorFactory::create();
        // Check if user is logged in
        $roles = $this->user->getRoles();
        //$this->setLayout('@layout');
        $isAllowed = false;
        foreach ($roles as $role) {
            if ($acl->isAllowed($role, 'front', 'view')) {
                $isAllowed = true;
                break;
            }
        }
        if (!$isAllowed) {
            $this->flashMessage('Access denied.', 'error');
            $this->redirect('Sign:in');
        }
    }
    
       protected function isAdmin(): bool
    {
        return $this->getUser()->isInRole('admin');
    }
}

