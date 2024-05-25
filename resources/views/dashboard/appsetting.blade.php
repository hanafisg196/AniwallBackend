@extends('_partials.content')
@section('content')

<div class="card">
    <div class="card-body">

        <form class="auth-login-form mt-2" action="/appsetting/update" method="post">
             @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-1">
                        <label for="package_name">Packname</label>
                        <input type="text" class="form-control" id="package_name"
                         name="package_name" value="{{ $data->package_name }}">
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="mb-1">
                        <label for="server_key">Server Key</label>
                        <div class="input-group">
                            <input type="text" class="form-control"
                             aria-describedby="button-addon2" id="api_key"
                             name="api_key" value="{{ $data->api_key }}"/>
                            <button class="btn btn-outline-primary" id="button-addon2"
                            type="button" onclick="generate_server_key()">GENERATE</button>
                        </div>
                    </div>
                </div>

                    <div class="col-md-12">
                        <button type="submit"
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                id="demo"
                                class="btn btn-gradient-primary float-end">Submit</button>
                    </div>

            </div>

        </form>
    </div>
</div>
@endsection
<script>
    function generate_uuid() {
        var uuid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
            var r = Math.random() * 16 | 0,
                v = c == 'x' ? r : (r & 0x3 | 0x8);
            return v.toString(16);
        });
        return uuid;
    }

    function generate_server_key() {
        var uuid = generate_uuid();
        document.getElementById('api_key').value = uuid;
    }


</script>
