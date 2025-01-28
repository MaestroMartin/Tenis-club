<?php

declare(strict_types=1);

namespace App\UI\FrontModul\presenters;

use App\UI\FrontModul\Presenters\BasePresenter;
use App\UI\Model\AuthorizatorFactory;
use App\UI\Model\AddReservationManager;
// HomePresenter for the main page
final class HomePresenter extends BasePresenter
{
    public function __construct(
        private AddReservationManager $reservationManager
    )
    { }

    public function renderDefault(): void
    {
        $this->template->reservations = $this->reservationManager->getAllReservations();
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


}