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

                <!-- test code start -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header">
                            <h1>My Progress</h1>
                        </div>
                        <div style="display:inline-block;width:100%;overflow-y:auto;">
                            <ul class="timeline timeline-horizontal">
                                <li class="timeline-item">
                                    <div class="timeline-badge bg-green"><i class="fa fa-check"></i></div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Project Proposal</h4>
                                        </div>
                                        <p><small class="text-muted"><i class="fa fa-clock"></i> 19/10/2020</small></p>
                                    </div>
                                </li>
                                <li class="timeline-item">
                                    <div class="timeline-badge bg-gray"><i class="fa fa-times"></i></div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Project Presentation</h4>
                                        </div>
                                        <p><small class="text-muted"><i class="fa fa-clock"></i> 14/10/2020</small></p>
                                    </div>
                                </li>
                                <li class="timeline-item">
                                    <div class="timeline-badge bg-gray"><i class="fa fa-times"></i></div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Agreement Form</h4>
                                        </div>
                                        <p><small class="text-muted"><i class="fa fa-clock"></i> 14/12/2020</small></p>
                                    </div>
                                </li>
                                <li class="timeline-item">
                                    <div class="timeline-badge bg-gray"><i class="fa fa-times"></i></div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Marking Scheme Form</h4>
                                        </div>
                                        <p><small class="text-muted"><i class="fa fa-clock"></i> 14/12/2020</small></p>
                                    </div>
                                </li>
                                <li class="timeline-item">
                                    <div class="timeline-badge bg-gray"><i class="fa fa-times"></i></div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Interim Report</h4>
                                        </div>
                                        <p><small class="text-muted"><i class="fa fa-clock"></i> 20/01/2021</small></p>
                                    </div>
                                </li>
                                <li class="timeline-item">
                                    <div class="timeline-badge bg-gray"><i class="fa fa-times"></i></div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Draft Report</h4>
                                        </div>
                                        <p><small class="text-muted"><i class="fa fa-clock"></i> 29/03/2021</small></p>
                                    </div>
                                </li>
                                <li class="timeline-item">
                                    <div class="timeline-badge bg-gray"><i class="fa fa-times"></i></div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Showcase Day</h4>
                                        </div>
                                        <p><small class="text-muted"><i class="fa fa-clock"></i> ---</small></p>
                                    </div>
                                </li>
                                <li class="timeline-item">
                                    <div class="timeline-badge bg-gray"><i class="fa fa-times"></i></div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Product Submission</h4>
                                        </div>
                                        <p><small class="text-muted"><i class="fa fa-clock"></i> 13/04/2021</small></p>
                                    </div>
                                </li>
                                <li class="timeline-item">
                                    <div class="timeline-badge bg-gray"><i class="fa fa-times"></i></div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">FYP Report</h4>
                                        </div>
                                        <p><small class="text-muted"><i class="fa fa-clock"></i> 19/04/2021</small></p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header">
                            <h1>Timeline</h1>
                        </div>
                        <ul class="timeline">
                            <li class="timeline-item">
                                <div class="timeline-badge"><i class="glyphicon glyphicon-off"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Mussum ipsum cacilds 1</h4>
                                        <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 11 hours ago via Twitter</small></p>
                                    </div>
                                    <div class="timeline-body">
                                        <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <div class="timeline-badge"><i class="glyphicon glyphicon-check"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Mussum ipsum cacilds 2</h4>
                                        <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 11 hours ago via Twitter</small></p>
                                    </div>
                                    <div class="timeline-body">
                                        <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros gostis.</p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <div class="timeline-badge"><i class="glyphicon glyphicon-check"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Mussum ipsum cacilds 3</h4>
                                        <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 11 hours ago via Twitter</small></p>
                                    </div>
                                    <div class="timeline-body">
                                        <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
                                        <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>

                                    </div>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <div class="timeline-badge"><i class="glyphicon glyphicon-check"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Mussum ipsum cacilds 4</h4>
                                        <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 11 hours ago via Twitter</small></p>
                                    </div>
                                    <div class="timeline-body">
                                        <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- test code end -->


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
                        <table id="myTable" class="table table-striped">
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
