@extends('layouts.manage')

@section('content')

<div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Edit Permissions</h1>
            </div>
        </div>
        <hr class="m-t-10">
        <div class="columns">
            <div class="column">
                <form action="{{route('permissions.update',$permissions->id)}}" method="POST">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <div class="field">
                        <label for="display_name" class="label m-t-10">Display Name</label>
                    </div>
                    <p class="control">
                        <input type="text" class="input" name="display_name" id="display_name" value="{{$permissions->display_name}}">
                    </p>
                    <div class="field">
                        <label for="description" class="label m-t-10">Description</label>
                    </div>
                    <p class="control">
                        <input type="text" class="input" name="description" id="description" value="{{$permissions->description}}">
                    </p>
                    <button class="is-success button m-t-10">Save User Detials</button>
                </form>
            </div>
        </div>
    
</div>            

@endsection