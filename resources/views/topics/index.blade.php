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
                                        <h5 class="card-title text-uppercase text-muted mb-0">Total Topics</h5>
                                        <span class="h2 font-weight-bold mb-0">{{count($topics)}}</span>
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
                                        <h5 class="card-title text-uppercase text-muted mb-0">My Topics</h5>
                                        <span class="h2 font-weight-bold mb-0">{{count($topics->where('user_id','=',auth()->id()))}}</span>
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
{{--                                        <span class="h2 font-weight-bold mb-0">{{count($messages->where('type','=',1))}}</span>--}}
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
{{--                                        <span class="h2 font-weight-bold mb-0">{{count($messages->where('type','=',2))}}</span>--}}
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
                                <h3 class="mb-0">Topics</h3>
                                <div class="form-check form-check-inline" onclick="filterlog('-1')">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="rad1" value="0" checked>
                                    <label class="form-check-label mb-0" for="rad1"><span class="badge badge-dark">All</span></label>
                                </div>

                                <div class="form-check form-check-inline" onclick="filterlog('{{auth()->id()}}')">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="rad1" value="0">
                                    <label class="form-check-label mb-0" for="rad1"><span class="badge badge-primary">My Topics</span></label>
                                </div>


                            </div>
                            <div>
                                <a onclick="add_topic()" class="btn btn-sm btn-primary">Add Topic</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                    </div>

                    <div id="logtable" class="tablealt">
                        <table>
                            <thead>
                            <tr style="color: #0a0c0d">
                                <th>Title</th>
                                <th>Body</th>
                                <th>QCA</th>
                                <th>Max Requests</th>
                                <th>Created</th>
                                <th>Supervisor</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($topics as $topic)
                                <tr id="{{$topic->user_id.'_'.$topic->id}}" style="color: #0a0c0d">
                                    <td>{{$topic->title}}</td>
                                    <td>{{ $topic->body }}</td>
                                    <td >{{ $topic->qca}}</td>
                                    <td>{{$topic->max_requests}}</td>
                                    <td>{{$topic->created_at}}</td>
                                    <td>{{$users->where('id', '=', $topic->user_id)->first()->name}}</td>
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
        function upload_topic(data) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            let ress = {
                title:data.title,
                body:data.body,
                qca:data.qca,
                max_requests:data.max_requests,
                _token : $('meta[name="csrf-token"]').attr('content')
            };
            console.log(ress);

            $.ajax({
                url: "/topics",
                type:"POST",
                dataType: 'JSON',
                data:  {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success:function(response){
                    console.log(response);
                    if(response) {
                        alert(response);
                    }
                },
            });
        }

        function add_topic() {
            //https://sweetalert2.github.io/#input-types
            Swal.mixin({
                input: 'text',
                confirmButtonText: 'Next &rarr;',
                showCancelButton: true,
                progressSteps: ['1', '2', '3',  '4']
            }).queue([
                {
                    title: 'Enter Topic',
                    text: 'Please enter Title'
                },
                {
                    title: 'Enter Description',
                    text: 'This enter A Description'
                },
                {
                    title: 'Enter QCA',
                    text: 'Set the minimum QCA for topic',
                    input: 'range',
                    inputAttributes: {
                        min: 2.0,
                        max: 4.0,
                        step: 0.1
                    },
                },

                {
                    title: 'Max Topic Requests',
                    text: 'Set a limit on how many can request this topic',
                    input: 'range',
                    inputAttributes: {
                        min: 1,
                        max: 20,
                        step: 1
                    },
                },
            ]).then((result) => {
                if (result.value) {

                    Swal.fire({
                        title: "Are you sure?",
                        text: "Please add topic to submit",
                        type: "info",
                        showCancelButton: true,
                        confirmButtonColor: "#4951e2",
                        confirmButtonText: "Add Topic?",
                        closeOnConfirm: false
                    }).then(function(res) {
                        console.log( res);
                        if(res.isConfirmed) {
                            let data = {}
                            data.title = result.value[0];
                            data.body = result.value[1];
                            data.qca = parseFloat(result.value[2]);
                            data.max_requests = parseInt(result.value[3]);
                            upload_topic(data);
                        }

                    })
                }
            })
        }

        function filterlog(mode) {
            $('.tablealt tr').each(function () {
                var t = $(this).attr('id');

                t = '' + t;
                const m = t.split('_')[0];
                if(mode === '-1') {
                    $('#'+ t).show();
                } else {
                    if(mode === m) {
                        $('#'+ t).show();
                    } else {
                        $('#'+ t).hide();
                    }
                }
            });
        }

    </script>
@endpush
