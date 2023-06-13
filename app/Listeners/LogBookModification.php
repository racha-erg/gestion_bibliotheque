<?php

namespace App\Listeners;

use App\Events\BookModified;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\BookHistory;

class LogBookModification
{
    use InteractsWithQueue;
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
    public function handle(BookModified $event)
    {
        $livre = $event->livre;

        // Create a new record in the BookHistory table to store the modification history
        BookHistory::create([
            'livre_id' => $livre->id,
            'action' => 'updated',
            'details' => 'The book details were updated.',
        ]);
    }
    
}
