<?php

namespace App\UI\FrontModul\Presenters;

use Nette\Application\UI\Form;
use App\UI\FrontModul\UserManager;
use App\UI\FrontModul\ReservationManager;
final class ReservationPresenter extends BasePresenter
{
    private ReservationManager $reservationManager;
    private UserManager $userManager;

    public function __construct(ReservationManager $reservationManager, UserManager $userManager)
    {
        $this->reservationManager = $reservationManager;
        $this->userManager = $userManager;
    }

    public function renderDefault(): void
    {
        if ($this->isAdmin()) {
            $this->template->reservations = $this->reservationManager->getAllReservations();
        } else {
            $userId = $this->getUser()->getId();
            $this->template->reservations = $this->reservationManager->getUserReservations($userId);
        }
    }

    public function handleDeleteReservation(int $reservationId): void
    {
        if (!$this->isAdmin()) {
            $this->flashMessage('Access denied: only admins can delete reservations.', 'error');
            $this->redirect('this');
        }

        $this->reservationManager->deleteReservation($reservationId);
        $this->flashMessage('Reservation deleted successfully.', 'success');
        $this->redirect('this');
    }

    public function createComponentReservationForm(): Form
    {
        $form = new Form;
        $form->addSelect('court', 'Court:', [1 => 'Court 1', 2 => 'Court 2'])->setRequired('Please select a court.');
        $form->addText('date', 'Date:')->setRequired('Please select a date.');
        $form->addText('time', 'Time (hour):')->setRequired('Please select a time.');
        $form->addSubmit('reserve', 'Reserve');
        $form->onSuccess[] = [$this, 'reservationFormSucceeded'];
        return $form;
    }

    public function reservationFormSucceeded(Form $form, \stdClass $values): void
    {
        $userId = $this->getUser()->getId();

        if (!$this->reservationManager->canReserve($userId, $values->date, $values->time)) {
            $this->flashMessage('Reservation failed: time slot unavailable or limit exceeded.', 'error');
            return;
        }

        $this->reservationManager->addReservation($userId, $values->court, $values->date, $values->time);
        $this->flashMessage('Reservation successful!', 'success');
        $this->redirect('this');
    }

    public function createComponentAdminSettingsForm(): Form
    {
        if (!$this->isAdmin()) {
            $this->flashMessage('Access denied: only admins can modify settings.', 'error');
            $this->redirect('this');
        }

        $form = new Form;
        $form->addInteger('weeklyLimit', 'Weekly Reservation Limit:')
            ->setDefaultValue($this->reservationManager->getWeeklyLimit())
            ->setRequired('Please set a weekly reservation limit.');
        $form->addSubmit('save', 'Save Settings');
        $form->onSuccess[] = [$this, 'adminSettingsFormSucceeded'];
        return $form;
    }

    public function adminSettingsFormSucceeded(Form $form, \stdClass $values): void
    {
        $this->reservationManager->setWeeklyLimit($values->weeklyLimit);
        $this->flashMessage('Settings updated successfully.', 'success');
        $this->redirect('this');
    }
}
