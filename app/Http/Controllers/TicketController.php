<?php


namespace App\Http\Controllers;


use App\Logging\LoggerFactory;
use App\Models\FypEvent;
use App\Models\FypEventState;
use App\Models\Progress;
use App\Models\Ticket;
use App\Models\User;

class TicketController
{
    public function index() {

        $tickets = Ticket::all();
        $users = User::all();

        return view('tickets.index')->with([
            'tickets' => $tickets,
            'users' => $users,
            ]);
    }

    public function create(){


        $ticket = new Ticket();
        $ticket->user_id = request()->get('user_id');
        $ticket->message = request()->get('message');
        $ticket->type = request()->get('type');
        $ticket->save();



    }
}
