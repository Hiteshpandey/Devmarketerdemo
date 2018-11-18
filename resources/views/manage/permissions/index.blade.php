@extends('layouts.manage')

@section('content')

<div class="flex-container">
    <div class="columns m-t-10">
        <div class="column">
            <h1 class="title">Manage Permissions</h1>
        </div>
        <div class="column">
            <a href="{{route('permissions.create')}}" class="button is-primary pull-right"> <i class="fa fa-user-plus m-r-10"></i> Create New Permission</a>
        </div>
    </div>

    <hr class="m-t-10">

    <div class="card">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Description</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                <tr>
                    <th>{{$permission->display_name}}</th>
                    <td>{{$permission->name}}</td>
                    <td>{{$permission->description}}</td>
                    <td><a href="{{route('permissions.show',$permission->id)}}" class="button is-outlined">View</a></td>
                    <td><a href="{{route('permissions.edit',$permission->id)}}" class="button is-outlined">Edit</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection