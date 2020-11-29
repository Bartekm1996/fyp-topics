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
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total Requests</h5>
                                        <span class="h2 font-weight-bold mb-0">{{count($mod_requests)}}</span>
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
                                            class="h2 font-weight-bold mb-0">0</span>
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
                                            class="h2 font-weight-bold mb-0">0</span>
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
                                            class="h2 font-weight-bold mb-0">0</span>
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
                        <div class="row align-items-end">
                            <div class="col-12">
                                <h3 class="mb-0">Log Messages</h3>
                                <div class="form-check form-check-inline" onclick="filterlog('-1')">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="rad1" value="0" checked>
                                    <label class="form-check-label mb-0" for="rad1"><span class="badge badge-dark">All</span></label>
                                </div>

                                <div class="form-check form-check-inline" onclick="filterlog('0')">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="rad1" value="0">
                                    <label class="form-check-label mb-0" for="rad1"><span class="badge badge-primary">Idle</span></label>
                                </div>
                                <div class="form-check form-check-inline" onclick="filterlog('1')">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="rad2" value="1">
                                    <label class="form-check-label mb-0" for="rad2"><span class="badge badge-info">Reviewing</span></label>
                                </div>
                                <div class="form-check form-check-inline" onclick="filterlog('2')">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="rad3" value="2">
                                    <label class="form-check-label mb-0" for="rad3"><span class="badge badge-success">Successful</span></label>
                                </div>

                                <div class="form-check form-check-inline" onclick="filterlog('3')">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="rad3" value="2">
                                    <label class="form-check-label mb-0" for="rad3"><span class="badge badge-warning">Declined</span></label>
                                </div>
                            </div>

                            <div class="col-4 text-right">
                                {{--                            <a href="" class="btn btn-sm btn-primary">Add user</a>--}}
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                    </div>

                    <div id="logtable" class="tablealt">
                        <table>
                            <thead>
                            <tr style="color: #0a0c0d">
                                <th>State</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>
                                    @if(auth()->user()->role == 0)
                                        Supervisor
                                    @else
                                        Student
                                    @endif

                                </th>
                                <th>Requested at</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($mod_requests as $req)

                                <tr id="{{$req['id']}}" style="color: #0a0c0d">
                                    <td>@switch ($req['state'])
                                            @case(0) <span class="badge badge-primary">Idle</span> @break
                                            @case(1) <span class="badge badge-info">Reviewing</span> @break
                                            @case(2) <span class="badge badge-success">Successful</span> @break
                                            @case(3) <span class="badge badge-warning">Declined</span> @break
                                        @endswitch
                                    </td>
                                    <td style="font-weight: bold">{{$req['title']}}</td>
                                    <td>{{$req['body']}}</td>

                                    <td>
                                        @if(auth()->user()->role == 1)
                                            <i class="fa fa-info-circle" onclick="studentInfo(
                                            '{{$req['user_name']}}',
                                            '{{$req['student_id']}}',
                                            '{{$req['user_qca']}}'
                                            )"></i>
                                        {{$req['user_name']}}
                                        @else
                                            {{$req['supervisor_name']}}
                                        @endif
                                    </td>
                                    <td>{{$req['requested_at']}}</td>
                                    <td>
                                        @if(auth()->user()->role == 0)
                                            <button class="btn btn-danger"><i class="fa fa-times"></i> </button>
                                            <button class="btn btn-info"><i class="fa fa-envelope"></i> </button>
                                        @elseif(auth()->user()->role == 1)
                                            <button class="btn btn-danger"><i class="fa fa-times"></i> </button>
                                            <button class="btn btn-success"><i class="fa fa-check"></i> </button>
                                            <button class="btn btn-info"><i class="fa fa-envelope"></i> </button>
                                        @endif
                                    </td>
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
    <script>
        function studentInfo(name,sid, qca) {
            console.log(name,sid, qca)
            Swal.fire(
                name,
                'Student ID:' + sid + '\<br\>QCA:' + qca,
                'info'
            )
        }

        function filterlog(mode) {
            $('.tablealt tr').each(function () {
                var t = $(this).attr('id');

                t = '' + t;
                const m = t.split('_')[0];
                if(mode === '-1') {
                    $('#'+ t).show();
                } else {
                    if(m === mode) {
                        $('#'+ t).show();
                    } else {
                        $('#'+ t).hide();
                    }
                }

            });
        }

    </script>
@endpush
