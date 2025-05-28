<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewNotificationCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $notification; // Los datos que se enviarán

    /**
     * Crear una nueva instancia del evento.
     */
    public function __construct($notification)
    {
        $this->notification = $notification;
    }

    /**
     * Canal público donde se emitirá el evento.
     */
    public function broadcastOn()
    {
        return new Channel('notifications'); 
    }

    /**
     * Nombre del evento para el frontend (opcional).
     */
    public function broadcastAs()
    {
        return 'new-notification';
    }

    /**
     * Summary of broadcastWith
     */
    public function broadcastWith()
    {
        return $this->notification;
    }

}
