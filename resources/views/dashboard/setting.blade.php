@extends('_partials.content')
@section('content')

<div class="card">
    <div class="card-body">
        <form class="auth-login-form mt-2" action="{{route('update.setting',$settings->id)}}" method="post">
             @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-1">
                        <label for="privacy_police">Privacy Police</label>
                        <input type="text" class="form-control" id="privacy_police" name="privacy_police"
                               value="{{$settings->privacy_police}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-1">
                        <label for="term_service">Term And Service</label>
                        <input type="text" class="form-control" id="term_service" name="term_service"
                        value="{{$settings->term_service}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-1">
                        <label for="developer">Developer</label>
                        <input type="text" class="form-control" id="developer" name="developer"
                        value="{{$settings->developer}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-1">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email"
                        value="{{$settings->email}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-1">
                        <label for="website">Website</label>
                        <input type="text" class="form-control" id="website" name="website"
                        value="{{$settings->website}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-1">
                        <label for="app_version">App Version</label>
                        <input type="text" class="form-control" id="app_version" name="app_version"
                        value="{{$settings->app_version}}">
                    </div>
                </div>
                    <div class="col-md-12">
                        <button type="submit" title="Disable On Demo"
                          class="btn btn-gradient-primary float-end">Submit</button>
                    </div>

            </div>
        </form>
    </div>
</div>
@endsection

