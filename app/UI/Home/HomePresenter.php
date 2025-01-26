<?php

declare(strict_types=1);

namespace App\UI\Home;

use Nette;
use App\UI\FrontModul\ReservationManager;


final class HomePresenter extends Nette\Application\UI\Presenter
{
    private ReservationManager $reservationManager;

    public function __construct(ReservationManager $reservationManager)
    {
        $this->reservationManager = $reservationManager;
    }

    public function renderDefault(): void
    {
        $this->template->reservations = $this->reservationManager->getAllReservations();
    }
}

