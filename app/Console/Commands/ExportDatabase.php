<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ExportDatabase extends Command
{
    protected $signature = 'db:export';

    protected $description = 'Export the database';

    public function handle()
    {
        $databaseName = DB::getDatabaseName();
        $fileName = $databaseName . '_' . now()->format('Y-m-d_H-i-s') . '.sql';

        $command = sprintf(
            'mysqldump -u%s -p%s %s > %s',
            config('database.connections.mysql.username'),
            config('database.connections.mysql.password'),
            $databaseName,
            storage_path('app/' . $fileName)
        );

        exec($command);

        $this->info('Database exported: ' . $fileName);
    }
}
