<?php

namespace App\Listeners;
use App\Events\ViewerEvent;
use App\Viewer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class IncreaseCounter
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(ViewerEvent $event)
    {
        $this ->updateViewer($event->viewer);
    }

    public function updateViewer($num)
    {
        $num->number_of_viewers = $num->number_of_viewers +1 ;
        $num ->save();
    }
}
