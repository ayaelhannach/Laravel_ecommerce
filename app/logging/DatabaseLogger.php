<?php

namespace App\Logging;
use Monolog\Logger;
use Monolog\Handler\AbstractProcessingHandler;
use Illuminate\Support\Facades\DB;

class DatabaseLogger extends AbstractProcessingHandler
{
    /**
     * Écrit le log dans la base de données.
     *
     * @param array $record
     * @return void
     */
    protected function write(array $record): void
    {
        DB::table('logs')->insert([
            'level' => $record['level_name'],        // Niveau du log (INFO, ERROR, etc.)
            'message' => $record['message'],         // Message du log
            'context' => json_encode($record['context']), // Données contextuelles
            'created_at' => now(),                   // Date de création
            'updated_at' => now(),                   // Date de mise à jour
        ]);
    }
}
