<?php

namespace App\UI\FrontModul\Presenters;

use Nette\Database\Explorer;
use Nette\SmartObject;
class ReservationManager
{
    use SmartObject;

    private Explorer $database;

    public function __construct(Explorer $database)
    {
        $this->database = $database;
    }

    public function getAllReservations(): array
    {
        return $this->database->table('reservations')->fetchAll();
    }

    public function addReservation(int $userId, int $court, string $date, int $time): void
    {
        $this->database->table('reservations')->insert([
            'user_id' => $userId,
            'court' => $court,
            'date' => $date,
            'time' => $time,
        ]);
    }

    public function canReserve(int $userId, string $date, int $time): bool
    {
        $weeklyLimit = $this->getWeeklyLimit();
        $reservationsCount = $this->database->table('reservations')
            ->where('user_id', $userId)
            ->where('date >= ?', date('Y-m-d', strtotime('monday this week')))
            ->where('date <= ?', date('Y-m-d', strtotime('sunday this week')))
            ->count();

        $conflict = $this->database->table('reservations')
            ->where('date', $date)
            ->where('time', $time)
            ->count();

        return $reservationsCount < $weeklyLimit && $conflict === 0;
    }

    public function getWeeklyLimit(): int
    {
        return (int) $this->database->table('settings')->where('key', 'weekly_limit')->fetchField('value') ?? 5;
    }

    public function setWeeklyLimit(int $limit): void
    {
        $this->database->table('settings')->where('key', 'weekly_limit')->update(['value' => $limit]);
    }
}
