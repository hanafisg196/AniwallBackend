@extends('_partials.content')
@section('content')

<div class="card">
    <div class="card-body">

        <form class="auth-login-form mt-2" action="/notification/send" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-1">
                        <label for="title">Notification Title</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-1">
                        <label for="message">Notification Message</label>
                        <input type="text" class="form-control" id="message" name="message">
                    </div>
                </div>
                <div class="col-md-12">
                    <button class="btn btn-gradient-primary float-end" type="submit">Send Notification</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection