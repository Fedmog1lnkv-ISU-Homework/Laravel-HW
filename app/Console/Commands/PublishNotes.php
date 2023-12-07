<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Note;

class PublishNotes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:publish-notes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish all notes that have to be published at time';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $affectedRows = Note::publish_unpublished_notes();
		echo "Publish $affectedRows notes that have to be published for time: " . now();
    }
}
