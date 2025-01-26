<?php

namespace App\UI\Presenters;

use Nette;
use App\UI\Model\ReservationManager;
use App\UI\Model\UserManager;
use Nette\Application\UI\Form;
final class AdminPresenter extends Nette\Application\UI\Presenter
{
    private ReservationManager $reservationManager;
    private UserManager $userManager;

    public function __construct(
        ReservationManager $reservationManager,
        UserManager $userManager
    ) {
        $this->reservationManager = $reservationManager;
        $this->userManager = $userManager;
    }

    public function renderDefault(): void
    {
        $this->template->reservations = $this->reservationManager->getAllReservations();
        $this->template->users = $this->userManager->getAllUsers();
    }

    public function handleDeleteReservation(int $reservationId): void
    {
        $this->reservationManager->deleteReservation($reservationId);
        $this->flashMessage('Reservation deleted successfully.', 'success');
        $this->redirect('this');
    }

    public function handleDeleteUser(int $userId): void
    {
        $this->userManager->deleteUser($userId);
        $this->flashMessage('User deleted successfully.', 'success');
        $this->redirect('this');
    }

    public function createComponentSettingsForm(): Form
    {
        $form = new Form;
        $form->addInteger('weeklyLimit', 'Weekly Reservation Limit:')
            ->setDefaultValue($this->reservationManager->getWeeklyLimit())
            ->setRequired('Please set a weekly reservation limit.');
        $form->addSubmit('save', 'Save Settings');
        $form->onSuccess[] = [$this, 'settingsFormSucceeded'];
        return $form;
    }

    public function settingsFormSucceeded(Form $form, \stdClass $values): void
    {
        $this->reservationManager->setWeeklyLimit($values->weeklyLimit);
        $this->flashMessage('Settings updated successfully.', 'success');
        $this->redirect('this');
    }
}
