@extends('layouts.app')

@section('content')

    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
                <!-- Card stats -->
            </div>
        </div>
    </div>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">

                    <div id="logtable" class="tablealt">
                        <table>
                            <thead>
                            <tr style="color: #0a0c0d">
                                    @if(auth()->user()->role == 0)
                                        <th>To</th>
                                    @endif
                                    @if(auth()->user()->role == 1)
                                        <th>From</th>
                                     @endif
                                    @if(auth()->user()->role == 2)
                                        <th>To</th>
                                        <th>From</th>
                                    @endif
                                <th>Topic</th>
                                <th>Message</th>
                                <th>Time</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($data['message'] as $msg)
                                <tr style="color: #0a0c0d">
                                        @if(auth()->user()->role == 1)
                                            @foreach($data['user'] as $users)
                                                @if($msg->from == $users->id)
                                                    <td>{{ $users->name }}</td>
                                                @endif
                                            @endforeach
                                        @endif
                                        @if(auth()->user()->role == 0)
                                            @foreach($data['user'] as $users)
                                                @if($msg->to == $users->id)
                                                    <td>{{ $users->name }}</td>
                                                @endif
                                            @endforeach
                                        @endif
                                        @if(auth()->user()->role == 2)
                                            @foreach($data['user'] as $users)
                                                @if($msg->to == $users->id)
                                                    <td>{{ $users->name }}</td>
                                                @endif
                                            @endforeach
                                            @foreach($data['user'] as $users)
                                               @if($msg->from == $users->id)
                                                   <td>{{ $users->name }}</td>
                                               @endif
                                            @endforeach
                                        @endif

                                                <td>{{ $msg->topic }}</td>
                                                <td>{{ $msg->message}}</td>
                                                <td>{{ $msg->created_at}}</td>
                                        </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">

                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

