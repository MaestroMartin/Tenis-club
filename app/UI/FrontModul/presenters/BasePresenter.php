<?php

declare(strict_types=1);

namespace App\UI\FrontModul\Presenters;


use Nette\Application\UI\Presenter;

// BasePresenter
abstract class BasePresenter extends Presenter
{
    protected function startup(): void
    {
        parent::startup();

        // Check if user is logged in
        if (!$this->getUser()->isLoggedIn()) {
            $this->flashMessage('You must be logged in to access this page.', 'error');
            $this->redirect('Sign:default');
        }
    }

    protected function isAdmin(): bool
    {
        return $this->getUser()->isInRole('admin');
    }
}

