<?php

declare(strict_types=1);

namespace App\UI\Model;

use Nette;
use Nette\Database\Explorer;

class ReservationManager
{
    use Nette\SmartObject;

    private Explorer $database;

    public function __construct(Explorer $database)
    {
        $this->database = $database;
    }

    public function getAllReservations(): array
    {
        return $this->database->table('reservations')->fetchAll();
    }

    public function deleteReservation(int $reservationId): void
    {
        $this->database->table('reservations')->where('id', $reservationId)->delete();
    }

    public function setWeeklyLimit(int $limit): void
    {
        $this->database->table('settings')->where('key', 'weekly_limit')->update(['value' => $limit]);
    }

    public function getWeeklyLimit(): int
    {
        return (int) $this->database->table('settings')->where('key', 'weekly_limit')->fetchField('value');
    }

    public function getReservationById(int $reservationId): ?Nette\Database\Row
    {
        return $this->database->table('reservations')->get($reservationId);
    }
}