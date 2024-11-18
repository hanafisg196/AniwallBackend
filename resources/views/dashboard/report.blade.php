@extends('_partials.content')
@section('content')
    <div class="card">
        <div class="card-header border-bottom p-">
            <div class="head-label"></div>
            <div class="dt-action-buttons text-end">
                <div class="dt-buttons d-inline-flex">
                    <input type="text" class="form-control" id="search" name="search" placeholder="Search">
                    &nbsp;
                    <a type="button" class="btn btn-icon btn-primary waves-effect waves-float waves-light">
                        <span><i data-feather='search'></i></span>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body mt-2">
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Wallpaper ID</th>
                                <th scope="col">Reporter Email</th>
                                <th scope="col">Owner Name</th>
                                <th scope="col">Owner Email</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        @foreach ($data as $item)
                            <tbody>
                                <tr>
                                    <td>{{$item->wallpaper_id}}</td>
                                    <td>{{$item->reporter_email}}</td>
                                    <td>{{$item->owner_name}}</td>
                                    <td>{{$item->owner_email}}</td>
                                    <td>Button</td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
