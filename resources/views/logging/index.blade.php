@extends('layouts.app')

@section('content')

    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
                <!-- Card stats -->
                <div class="row">
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total Messages</h5>
                                        <span class="h2 font-weight-bold mb-0">{{count($messages)}}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                            <i class="fas fa-chart-bar"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Debug</h5>
                                        <span
                                            class="h2 font-weight-bold mb-0">{{count($messages->where('type','=',0))}}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                                            <i class="fas fa-bug"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Info</h5>
                                        <span
                                            class="h2 font-weight-bold mb-0">{{count($messages->where('type','=',1))}}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-gray text-white rounded-circle shadow">
                                            <i class="fas fa-info-circle"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Error</h5>
                                        <span
                                            class="h2 font-weight-bold mb-0">{{count($messages->where('type','=',2))}}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-red text-white rounded-circle shadow">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Log Messages</h3>
                            </div>
                            <div class="col-4 text-right">
                                {{--                            <a href="" class="btn btn-sm btn-primary">Add user</a>--}}
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                    </div>

                    <div class="table-responsive">
                        {{--                    <table id="myTable" class="table align-items-center table-flush">--}}
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Tag</th>
                                <th>Message</th>
                                <th>Type</th>
                                <th>Timestamp</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($messages as $msg)
                                <tr>
                                    <td>{{ $msg->tag }}</td>
                                    <td>{{ $msg->message}}</td>
                                    <td>@switch ($msg->type)
                                            @case(0) <span class="badge badge-primary">DEBUG</span> @break
                                            @case(1) <span class="badge badge-info">INFO</span> @break
                                            @case(2) <span class="badge badge-warning">ERROR</span> @break
                                        @endswitch
                                    </td>
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

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
