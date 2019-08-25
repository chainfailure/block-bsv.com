<?php

namespace App\Console\Commands;

use App\Entry;
use Illuminate\Console\Command;
use Spatie\Browsershot\Browsershot;

class EntryViolation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'entry:violation {entry} {link}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds a violation to the specified entry.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $filename = uniqid();
        $entryId  = $this->argument('entry');
        $link     = $this->argument('link');

        $entry = Entry::find($entryId);
        if ($entry === null) {
            $this->error('Could not specified entry.');
            return ;
        }

        $this->info('Capturing screenshot of violation...');

        Browsershot::url($link)
            ->windowSize(1920, 1080)
            ->waitUntilNetworkIdle()
            ->save(storage_path("app/violations/{$filename}.png"));

        $this->info("Screenshot captured, saved as {$filename}.");

        $violation = $entry->violations()->create([
            'link'       => $link,
            'screenshot' => $filename,
        ]);

        $this->info("Filed violation as #{$violation->id}.");
    }
}
