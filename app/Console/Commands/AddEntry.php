<?php

namespace App\Console\Commands;

use App\Entry;
use Illuminate\Console\Command;

class AddEntry extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'entry:add {handle} {reason?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds a single handle to the ban list.';

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
        $handle = $this->argument('handle');
        $reason = $this->argument('reason');

        $entry = Entry::create([
            'handle' => $handle,
            'reason' => $reason,
        ]);

        $this->line("Added entry {$handle} as #{$entry->id}!");
    }
}
