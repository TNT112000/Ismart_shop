<?php

namespace App\Listeners;

use App\Events\RecordCreating;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RecordCreatingListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(RecordCreating $event): void
    {
        $event->recordData['created_by'] = 'admin';
    }
}
