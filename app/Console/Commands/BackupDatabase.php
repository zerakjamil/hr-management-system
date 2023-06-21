<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\DbDumper\Databases\MySql;

class BackupDatabase extends Command
{
    protected $signature = 'db:backup';

    protected $description = 'Backup the database';

    public function handle()
    {
        $databaseName = config('database.connections.mysql.database');
        $fileName = $databaseName . '_' . now()->format('Y-m-d_H-i-s') . '.sql';

        MySql::create()
            ->setDbName($databaseName)
            ->setUserName(config('database.connections.mysql.username'))
            ->setPassword(config('database.connections.mysql.password'))
            ->dumpToFile(storage_path('app/backups/' . $fileName));

        $this->info('Database backup created: ' . $fileName);
    }
}
