@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="css/userTickets.css">
<script src="js/userTickets.js"></script>

<div class="container" id="main_cont">
    <div class="row">
        <div class="panel">
            <div style="width: 200px;">
                <input class="form-control ml-2 mt-4" placeholder="Enter ticket number" onkeyup="filterTickets(this)">
            </div>
            <div class="pull-right mb-5 mt-3">
                <div style="display: grid; grid-template-columns: auto auto auto; grid-gap: 5px;">
                    <button type="button" class="btn btn-success btn-filter" data-target="other">Other</button>
                    <button type="button" class="btn btn-warning btn-filter" data-target="not_receiving_verification_Email">Not Receiving Verification Email</button>
                    <button type="button" class="btn btn-warning btn-filter" data-target="cannot_login">Cannot Login</button>
                    <button type="button" class="btn btn-danger btn-filter" data-target="abusive_messages">Abusive Messages</button>
                    <button type="button" class="btn btn-danger btn-filter" data-target="continous_stalking">Continous Stalking</button>
                    <button type="button" class="btn btn-danger btn-filter" data-target="inapropiate_behaviour">Inappropiate Behaviour</button>
                    <button type="button" class="btn btn-default btn-filter" data-target="all">All</button>
                </div>
            </div>
            <div class="table-container">
                <table class="table table-filter">
                    <tbody id="complaints">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
