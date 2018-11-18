@extends('layouts.manage')

@section('content')

<div class="flex-container">
    <div class="columns m-t-10">
        <div class="column">
            <h1 class="title">{{$roles->display_name}} <small class="m-l-25"><em>{{$roles->name}}</em></small></h1>
            <h5>{{$roles->description}}</h5>
        </div>
        <div class="column">
            <a href="{{route('roles.edit',$roles->id)}}" class="button is-primary pull-right"> <i class="fa fa-user m-r-10"></i> Edit Role</a>
        </div>
    </div>

    <hr class="m-t-10">

    <div class="columns">
        <div class="column">
            <div class="box">
                <article class="media">
                    <div class="media-content">
                        <div class="content">
                            <h2>Permissions:</h2>
                            <ul>
                                @foreach ($roles->permissions as $role) 
                                {{-- roles and permissions relationship also called lazy loading if relation is not specified in the model while fetching data since we are accessing roles permissions related data at view itself --}}
                                    <li>{{$role->display_name}} <em class="m-l-15">{{$role->name}}</em></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</div>

@endsection