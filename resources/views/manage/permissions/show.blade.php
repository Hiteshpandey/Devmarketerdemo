@extends('layouts.manage')

@section('content')

<div class="flex-container">
    <div class="columns m-t-10">
        <div class="column">
            <h1 class="title">View Permission Detials</h1>
        </div>
        <div class="column">
            <a href="{{route('permissions.edit',$permissions->id)}}" class="button is-primary pull-right"> <i class="fa fa-user m-r-10"></i> Edit Permission</a>
        </div>
    </div>

    <hr class="m-t-10">

    <div class="card p-t-10 p-b-10 p-l-10 p-r-10">
       <span ><strong>{{$permissions->display_name}}</strong></span></h3> <span>{{$permissions->name}}</span>
       <h3>{{$permissions->description}}</h3>
    </div>
</div>

@endsection