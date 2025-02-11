<?php

namespace App\UI\FrontModul\Presenters;

use Nette\Application\UI\Form;
use App\UI\FrontModul\presenters\UserManager;
use App\UI\FrontModul\Presenters\ReservationManager;


final class ReservationPresenter extends BasePresenter
{   
    public function __construct(
        private ReservationManager $reservationManager,
        private UserManager $userManager
    ){}

    public function renderDefault(): void
    {
        if ($this->isAdmin()) {
            $reservations = $this->reservationManager->getAllReservations();
        } else {
            $userId = $this->getUser()->getId();
            bdump('color');
            if ($userId === null) {
                $this->flashMessage('Please sign in to view your reservations.', 'info');
                $this->redirect('Sign:in');
            } else {
                $reservations = $this->reservationManager->getReservationsByUserId($userId);
            }
        }

        

        $this->template->reservations = $reservations;
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
        $timeOptionsStart = array_combine(range(8, 19), range(8, 19));
        $timeOptionsEnd = array_combine(range(9, 20), range(9, 20));

        $form = new Form;
        $form->addSelect('court', 'Court:', [1 => 'Court 1', 2 => 'Court 2'])->setRequired('Please select a court.');
        $form->addDate('date', 'Date:')
            ->setRequired('Please select a date.')
            ->setHtmlAttribute('min', date('Y-m-d'));
        $form->addSelect('time', 'Time (hour):',$timeOptionsStart)
            ->setRequired('Please select a start time.');
        $form->addSelect('end_time','End Time:', $timeOptionsEnd)
            ->setRequired('Please select an end time.');
            
       
        $form->addSubmit('reserve', 'Reserve');
        $form->onSuccess[] = [$this, 'reservationFormSucceeded'];
        return $form;
    }

    public function reservationFormSucceeded(Form $form, \stdClass $values): void
    {
        $userId = $this->getUser()->getId();
        if ($userId === null) {
            $this->flashMessage('Please sign in to make a reservation.', 'info');
            $this->redirect('Sign:in');
        }


        if ($values->end_time <= $values->time) {
            $this->flashMessage('End time must be at least +1 hour from start time.', 'error');
            return;
        }
        $formattedDate = $values->date instanceof \DateTimeImmutable 
            ? $values->date->format('Y-m-d') 
            : $values->date;

        if (!$this->reservationManager->canReserve(
    $userId, 
    $formattedDate, 
    $values->time, 
    $values->end_time)) {
            
            return;
        }

    $this->reservationManager->addReservation(
        userId: $userId,
        court: $values->court,
        date: $values->date->format('Y-m-d'), // Převod na string
        time: $values->time,
        end_time: $values->end_time
    );
        $this->flashMessage(' Reservation successful!', 'success');
        $this->redirect('reservation:default');
    }

    public function createComponentAdminSettingsForm(): Form
    {
        if (!$this->isAdmin()) {
            $this->flashMessage('Access denied: only admins can modify settings.', 'error');
            $this->redirect('home:default');
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
