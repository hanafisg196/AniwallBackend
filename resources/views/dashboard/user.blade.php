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
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Profile</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        @foreach ($data as $item)
                            <tbody>
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        @if (!$item->avatar)
                                        <img src="{{asset('plugins/app-assets/images/no-image.png')}}" alt="" class="rounded-circle"
                                        alt="Profile Picture" style="width: 50px; height: 50px; object-fit: cover;">
                                        @else
                                        <img src="{{$item->avatar}}" alt="" class="rounded-circle"
                                        alt="Profile Picture" style="width: 50px; height: 50px; object-fit: cover;">
                                        @endif
                                    </td>
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
