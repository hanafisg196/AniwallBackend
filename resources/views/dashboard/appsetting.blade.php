@extends('_partials.content')
@section('content')

<div class="card">
    <div class="card-body">
       
        <form class="auth-login-form mt-2" action="/appsetting/update" method="post">
             @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-1">
                        <label for="onesignal_id">One Signal ID</label>
                        <input type="text" class="form-control" id="onesignal_id" name="onesignal_id"
                               value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-1">
                        <label for="onesignal_rest">One Signal Rest Key</label>
                        <input type="text" class="form-control" id="onesignal_rest" name="onesignal_rest"
                               value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-1">
                        <label for="packagename">More Apps URL</label>
                        <input type="text" class="form-control" id="packagename" name="packagename"
                               value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-1">
                        <label for="privacy">Privacy Police</label>
                        <input type="text" class="form-control" id="privacy" name="privacy"
                               value="">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-1">
                        <label for="server_key">Server Key</label>
                        <div class="input-group">
                            <input type="text" class="form-control"
                             aria-describedby="button-addon2" id="server_key" name="server_key" value=""/>
                            <button class="btn btn-outline-primary" id="button-addon2" 
                            type="button" onclick="generate_server_key()">GENERATE</button>
                        </div>
                    </div>
                </div>
                
                    <div class="col-md-12">
                        <button type="button"
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                title="Disable On Demo"
                                class="btn btn-gradient-primary float-end">Submit</button>
                    </div>
              
            </div>
        </form>
    </div>
</div>
@endsection

