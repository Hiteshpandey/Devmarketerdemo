@extends('layouts.manage')

@section('content')

<div class="flex-container">
    <div class="columns m-t-10">
        <div class="column">
            <h1 class="title">Manage Users</h1>
        </div>
        <div class="column">
            <a href="{{route('users.create')}}" class="button is-primary"> <i class="fa fa-user-add m-r-10"></i> Create New User</a>
        </div>
    </div>

    <hr class="m-t-10">

    <div class="card">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at}}</td>
                    <td><a href="{{route('users.edit',$user->id)}}" class="button is-outlined">Edit</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{$users->links()}}

@endsection