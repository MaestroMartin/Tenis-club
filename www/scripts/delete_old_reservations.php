<?php

declare(strict_types=1);

namespace www\scripts;

use Nette\Database\Explorer;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class DeleteOldReservationsCommand extends Command
{
    protected static $defaultName = 'reservations:cleanup';
    private Explorer $database;

    public function __construct(Explorer $database)
    {
        parent::__construct();
        $this->database = $database;
    }

    protected function configure(): void
    {
        $this->setDescription('Deletes old reservations from the database.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $deletedRows = $this->database->table('reservations')
            ->where('date < ?', new \DateTime())
            ->delete();

        $output->writeln("Deleted $deletedRows old reservations.");
        return Command::SUCCESS;
    }
}


