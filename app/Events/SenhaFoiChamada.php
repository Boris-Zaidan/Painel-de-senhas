<?php

namespace App\Events;

use App\Models\Senha;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SenhaFoiChamada implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(public Senha $senha)
    {

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('senhas'),
        ];
    }

    public function broadcastWith(): array
    {
        return [
            'id' => $this->senha->id,
            'codigo' => $this->senha->codigo,
            'tipo' => $this->senha->tipo,
            'status' => $this->senha->status,
            'chamado_em' => $this->senha->chamado_em

        ];
    }
}
