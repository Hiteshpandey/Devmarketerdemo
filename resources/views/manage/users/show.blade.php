@extends('layouts.manage')

@section('content')
<div class="flex-container">
    <div class="columns m-t-10">
        <div class="column">
        <h1 class="title">View User Detials</h1>
        </div>
        <div class="column">
        <a href="{{route('users.edit', $user->id)}}" class="button is-primary is-pulled-right">
                <i class="fa fa-user m-r-10"></i> Edit User
            </a>
        </div>
    </div>
    <hr class="m-t-10">
    <div class="columns">
            <div class="column">
                    <div class="field">
                        <label for="name" class="label m-t-10">Name</label>
                    </div>
                    <p class="control">
                        {{$user->name}}
                    </p>

                    <div class="field">
                        <label for="email" class="label m-t-10">Email</label>
                    </div>
                    <p class="control">
                        {{$user->email}}
                    </p>
            </div>
        </div>

        <div class="columns">
            <div class="column">
                <div>
                    <label for="roles" class="label m-t-10">Roles</label>
                </div>
                <div>{{$user->roles->count() == 0 ? 'This user has not been assigned any roles yet!' : ''}}</div>
                @foreach ($user->roles as $item)
                <ul>
                    <li>{{$item->display_name}}<sub>{{$item->description}}</sub></li>
                </ul>
                @endforeach
            </div>
        </div>
</div>
@endsection