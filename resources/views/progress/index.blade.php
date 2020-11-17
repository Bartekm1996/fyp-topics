@extends('layouts.app')

@section('content')

    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
                <!-- test code start -->
                <div class="row">
                    <div class="col-md-12">

                            <h1 style="color: white;font-weight: bold">My Progress</h1>

                        <div style="display:inline-block;width:100%;overflow-y:auto;">
                            <ul class="timeline timeline-horizontal">
                                @foreach ($events as $event)
                                    <li class="timeline-item">

                                        @switch($eventstates->where('fypevent_id','=', $event->id)->first()->state)
                                            @case(1)
                                                <div class="timeline-badge bg-orange"><i class="fa fa-clock"></i></div>
                                            @break
                                            @case(2)
                                                <div class="timeline-badge bg-green"><i class="fa fa-check"></i></div>
                                            @break
                                            @default
                                                <div class="timeline-badge bg-gray"><i class="fa fa-times"></i></div>
                                        @endswitch

                                        <div class="timeline-panel">
                                            <div class="timeline-heading">
                                                <h4 class="timeline-title">{{$event->title}}</h4>
                                            </div>
                                            <p><small class="text-muted"><i class="fa fa-clock"></i> {{$event->enddate}}</small></p>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                            <h1 style="color: white;font-weight: bold">Timeline</h1>

                        <ul class="timeline">

                            @foreach ($events as $event)
                                <li class="timeline-item">

                                    @switch($eventstates->where('fypevent_id','=', $event->id)->first()->state)
                                        @case(1)
                                        <div class="timeline-badge bg-orange"><i class="fa fa-clock"></i></div>
                                        @break
                                        @case(2)
                                        <div class="timeline-badge bg-green"><i class="fa fa-check"></i></div>
                                        @break
                                        @default
                                        <div class="timeline-badge bg-gray"><i class="fa fa-times"></i></div>
                                    @endswitch

                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">{{$event->title}}</h4>
                                        </div>
                                        <p><small class="text-muted"><i class="fa fa-clock"></i> {{$event->enddate}}</small></p>
                                        <div class="timeline-body">
                                            <p>{{$event->description}}</p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- test code end -->


            </div>
        </div>
    </div>
    <div class="container-fluid mt--7">

    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush