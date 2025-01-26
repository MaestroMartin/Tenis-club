<?php

declare(strict_types=1);

namespace App\UI\FrontModul\Presenters;

use App\UI\FrontModul\Presenters\BasePresenter;
use App\UI\Model\AuthorizatorFactory;

// HomePresenter for the main page
final class HomePresenter extends BasePresenter
{

    public function renderDefault(): void
    {
        $this->template->reservations = $this->reservationManager->getAllReservations();
    }

    protected function beforeRender(): void
    {
    parent::beforeRender();
    dump(__DIR__ . '/../../templates/@layout.latte'); // Kontrola cesty
    $this->setLayout(__DIR__ . '/../../templates/@layout.latte');
    }
    protected function startup(): void
{
    parent::startup();
    $acl = AuthorizatorFactory::create();
    $acl->addResource('reservation');

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


}