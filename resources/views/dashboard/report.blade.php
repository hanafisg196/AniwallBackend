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
            <!-- Tabs Navigation -->
            <ul class="nav nav-tabs" id="tabContent" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#Wallpaper" type="button" role="tab" aria-controls="all" aria-selected="true">Wallpaper</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="reported-tab" data-bs-toggle="tab" data-bs-target="#User" type="button" role="tab" aria-controls="reported" aria-selected="false">User</button>
                </li>
            </ul>

            <!-- Tabs Content -->
            <div class="tab-content mt-3" id="tabContent">
                <!-- All Tab -->
                <div class="tab-pane fade show active" id="Wallpaper" role="tabpanel" aria-labelledby="all-tab">
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

                <!-- Reported Tab -->
                <div class="tab-pane fade" id="User" role="tabpanel" aria-labelledby="reported-tab">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Wallpaper ID</th>
                                        <th scope="col">Reporter Email</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                @foreach ($data->where('is_reported', true) as $item)
                                    <tbody>
                                        <tr>
                                            <td>{{$item->wallpaper_id}}</td>
                                            <td>{{$item->reporter_email}}</td>
                                            <td>Button</td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
