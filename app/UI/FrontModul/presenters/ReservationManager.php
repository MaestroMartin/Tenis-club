<?php

namespace App\UI\FrontModul\Presenters;

use Nette\Application\Responses\RedirectResponse;
use Nette\Database\Explorer;
use Nette\SmartObject;

use Nette\Database\Table\ActiveRow;

class ReservationManager
{
    use SmartObject;

    private Explorer $database;

    public function __construct(Explorer $database,)
    {
        $this->database = $database;
        
    }

    public function getAllReservations()
    {
        return $this->database->table('reservations')->fetchAll();

        
    }

    public function addReservation(int $userId, int $court, string $date, int $time, int $end_time)
    {
        $existingReservation = $this->database->table('reservations')
        ->where('court', $court)
        ->where('date', $date)
        ->where('time', $time)
        ->fetch();

        if ($existingReservation) {
            return false; 
        }
        
        $this->database->table('reservations')->insert([
            'user_id' => $userId,
            'court' => $court,
            'date' => $date,
            'time' => $time,
            'end_time' => $end_time,
            
        ]);
         return true;
         
    }

   

    public function canReserve(int $userId, string $date, int $time, int $end_time): bool
{
    // Převod datumu na formátovaný řetězec
    if ($date instanceof \DateTimeImmutable) {
        $date = $date->format('Y-m-d');
    }

    // Výpočet začátku a konce aktuálního týdne
    $startOfWeek = (new \DateTimeImmutable('monday this week'))->format('Y-m-d');
    $endOfWeek = (new \DateTimeImmutable('sunday this week'))->format('Y-m-d');

    // Počet rezervací uživatele za aktuální týden
    $weeklyReservations = $this->database->table('reservations')
        ->where('user_id', $userId)
        ->where('date >= ?', $startOfWeek)
        ->where('date <= ?', $endOfWeek)
        ->count();

    // Získání maximálního limitu rezervací na týden
    $weeklyLimit = $this->getWeeklyLimit();

    // Kontrola, zda již existuje stejná rezervace
    $conflict = $this->database->table('reservations')
        ->where('date', $date)
        ->where('time', $time)
        ->where('end_time', $end_time)
        ->count();

    // Uživatel nesmí překročit týdenní limit a nesmí mít kolizní rezervaci
    return $weeklyReservations < $weeklyLimit && $conflict === 0;
}


    public function getWeeklyLimit(): int
    {
        $weeklyLimit = $this->database->table('settings')
            ->where('setting_key', 'weekly_limit')
            ->fetch();

    return $weeklyLimit ? (int) $weeklyLimit->value : 5; // Defaultní hodnota je 5, pokud není nastavena
    }
 


public function setWeeklyLimit(int $limit): void
{
    $this->database->table('settings')
        ->where('setting_key', 'weekly_limit')
        ->update(['value' => $limit]);
}


    public function getReservationsByUserId(int $userId): array
{
    return $this->database->table('reservations')
        ->where('user_id', $userId)
        ->fetchAll();
}

}
