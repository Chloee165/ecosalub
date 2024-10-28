<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SetStoragePermissions extends Command
{
    protected $signature = 'storage:set-permissions';

    protected $description = 'Set permissions for the storage/app/public directory';

    public function handle()
    {
        $directoryPath = storage_path('app/public');
        
        // Set directory permissions
        chmod($directoryPath, 0755);

        // Recursively set permissions for files and subdirectories
        $files = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($directoryPath),
            \RecursiveIteratorIterator::SELF_FIRST
        );

        foreach ($files as $file) {
            if ($file->isDir()) {
                chmod($file->getRealPath(), 0755); // Directories
            } else {
                chmod($file->getRealPath(), 0644); // Files
            }
        }

        $this->info('Permissions set for storage/app/public!');
    }
}

