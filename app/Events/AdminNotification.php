<?php

namespace App\Events;


use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;



class AdminNotification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $type;
    public $message;
    public $time;
      //public $id;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($data = [])
    {
        $this->type = $data['type'];
        $this->message = $data['message'];
        $this->time = $data['time'];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
        public function broadcastAs() {

        return 'AdminNotification';
        
        }


    public function broadcastOn()
    {
       // return new PrivateChannel('status-liked');
        return ['add-notify'];
        //  return new Channel('status-liked');


    }

}
