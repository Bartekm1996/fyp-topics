@extends('layouts.app', ['title' => __('Tickets')])

@section('content')
    <link rel="stylesheet" href="css/userTickets.css">
    <script src="js/userTickets.js"></script>
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body"></div>
        </div>
    </div>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-4">User Tickets</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-12"></div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>
                                    <input type="text" class="form-control" id="nameFilterBox"
                                           placeholder="Filter By Name"
                                           onkeyup="filterTicketsByAttr(this, 'data-name')">
                                </th>
                                <th>
                                    <input type="email" class="form-control" id="emailFilterBox"
                                           placeholder="Filter By Email"
                                           onkeyup="filterTicketsByAttr(this, 'data-email')">
                                </th>
                                <th>Message</th>
                                <th>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                            Filter By Type
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#"
                                               onclick="filterTicketsByType('0', 'data-type')">Change Details</a>
                                        </div>
                                    </div>
                                </th>
                                <th>Created</th>
                                <th>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                            Filter By Status
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#"
                                               onclick="filterTicketsByType('1', 'data-status')">Resolved</a>
                                            <a class="dropdown-item" href="#"
                                               onclick="filterTicketsByType('0', 'data-status')">Unresolved</a>
                                        </div>
                                    </div>
                                </th>
                                <th>Resolve</th>
                            </tr>
                            </thead>
                            <tbody id="ticketsTable">
                            @foreach ($tickets as $ticket)
                                @if($ticket->user_id == auth()->user()->id || auth()->user()->role == 2)
                                    @foreach($users as $user)
                                        @if($ticket->user_id == $user->id)
                                            <tr data-name="'{{$user->name}}'" data-email="'{{$user->email}}'"
                                                data-status="{{$ticket->resolved}}" data-type="{{$ticket->type}}">
                                                <td> {{ $ticket->id }} </td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                @endif
                                                @endforeach
                                                <td><textarea class="form-control" rows="2" style="resize: none;"
                                                              disabled>{{ $ticket->message }}</textarea></td>
                                                <td>
                                                    @switch ($ticket->type)
                                                        @case(0) <span
                                                            class="badge badge-primary">Change Details</span> @break
                                                        @case(1) <span
                                                            class="badge badge-info">Incorrect Qca</span> @break
                                                        @case(2) <span
                                                            class="badge badge-warning">Incorrect Course</span> @break
                                                    @endswitch
                                                </td>
                                                <td>{{ $ticket->created_at}}</td>
                                                <td>
                                                    @switch ($ticket->resolved)
                                                        @case(0) <span
                                                            class="badge badge-primary">Unresolved</span> @break
                                                        @case(1) <span class="badge badge-info">Resolved</span> @break
                                                    @endswitch
                                                </td>
                                                @if(auth()->user()->role == 2 && $ticket->resolved == 0)
                                                    <td>
                                                        <button type="button" class="btn btn-danger"
                                                                onclick="markResolved({{$ticket->id}})">Resolve
                                                        </button>
                                                    </td>
                                                @else
                                                    <td></td>
                                                @endif
                                            </tr>
                                        @endif
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="..."></nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
