<?php

namespace App\Listeners;

use App\Events\eventNotif;
use App\Models\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class listenerEventNotif
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\eventNotif  $event
     * @return void
     */
    public function handle(eventNotif $event)
    {
        Notification::create([
            'notif' => 'pengguna baru, dengan email = ' . $event->notif
        ]);

        Log::info('pengguna baru, dengan email = ' . $event->notif);
    }
}
