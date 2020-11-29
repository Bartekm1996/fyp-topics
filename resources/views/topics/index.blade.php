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
                                @if(auth()->user()->role == 1)

                                    <div class="form-check form-check-inline" onclick="filterlog('-1')">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="rad1" value="0" checked>
                                        <label class="form-check-label mb-0" for="rad1"><span class="badge badge-dark">All</span></label>
                                    </div>

                                    <div class="form-check form-check-inline" onclick="filterlog('{{auth()->id()}}')">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="rad1" value="0">
                                        <label class="form-check-label mb-0" for="rad1"><span class="badge badge-primary">My Topics</span></label>
                                    </div>
                                    <div>
                                        <a onclick="add_topic()" class="btn btn-sm btn-primary">Add Topic</a>
                                    </div>

                                @elseif(auth()->user()->role == 0)
                                    <input id="search" class="form-control" type="text" placeholder="Search..." onkeyup="filterTopics()">
                                @endif

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
                                <th>Action</th>
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
                                    <td>
                                        @if(auth()->user()->role == 1)
                                            <button class="btn btn-danger" onclick="deleteTopic({{$topic->id}})"><i class="fa fa-trash"></i></button>
                                        @else
                                            <button class="btn btn-primary" onclick="requestTopic({{$topic->id}}, {{$topic->user_id}})"><i class="fa fa-external-link-alt"></i></button>
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
        function sendRequest(data, method, url, type, success) {
            $.ajax({
                url: url,
                type:method,
                data: data,
                dataType:type,
                success:success,
            });
        }
        function requestTopic(topic_id, supervisor_id) {
            sendRequest(
                {
                    id: topic_id,
                    supervisor_id: supervisor_id,
                    _token : $('meta[name="csrf-token"]').attr('content')
                },
                'PATCH', '/topics', 'json',
                function (response){
                    if(response) {
                        console.log(response);
                        if(response.status) {
                            console.log('Requested:' + response.id);
                            window.location.href = window.location.href;
                        }
                    }
                }
            );
        }

        function deleteTopic(id) {
            sendRequest(
                {id: id,
                _token : $('meta[name="csrf-token"]').attr('content')},
                'DELETE', '/topics', 'json',
                function (response){
                    if(response) {
                        console.log(response);
                        if(response.status) {
                            console.log('deleted:' + response.id);
                            window.location.href = window.location.href;
                        }
                    }
                }
            );
        }


        function upload_topic(data) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': @json(csrf_token())
                }
            });

            let ress = {
                data: {
                    title:data.title,
                    body:data.body,
                    qca:data.qca,
                    max_requests:data.max_requests,
                    _token : $('meta[name="csrf-token"]').attr('content')
                },

            };
            //console.log(ress);

            $.ajax({
                url: "/topics",
                type:"POST",
                data: ress,
                dataType:"json",
                success:function(response){
                    console.log(response);
                    if(response) {
                        if(response.status) {
                            window.location.href = window.location.href;
                        }
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

        function filterTopics() {
            let search = $('#search').val();
            console.log(search);

            $('.tablealt tr').each(function (j) {
                if(j > 0) { //skip header
                    let ele = $(this).text().split('\n');
                    let id = $(this).attr('id');

                    let hasMatch = false;

                    for(var i = 0; i < ele.length; i++) {
                        let txt = ele[i].trim();
                        if(txt.length > 0) {
                            if(txt.indexOf(search) !== -1) {
                                hasMatch = true;
                                break;
                            }
                        }
                    }

                    if(hasMatch) {
                        $('#'+ id).show();
                    } else {
                        $('#'+ id).hide();
                    }
                }

            });
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
