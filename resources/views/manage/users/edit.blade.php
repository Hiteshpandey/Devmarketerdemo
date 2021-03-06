@extends('layouts.manage')

@section('content')

<div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Edit User</h1>
            </div>
        </div>
        <hr class="m-t-10">
        <form action="{{route('users.update',$user->id)}}" method="POST">
        <div class="columns">
            <div class="column">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <div class="field">
                        <label for="name" class="label m-t-10">Name</label>
                    </div>
                    <p class="control">
                        <input type="text" class="input" name="name" id="name" value="{{$user->name}}">
                    </p>

                    <div class="field">
                        <label for="email" class="label m-t-10">Email</label>
                    </div>
                    <p class="control">
                        <input type="text" class="input" name="email" id="email" value="{{$user->email}}">
                    </p>

                    <div class="field">
                        <label for="password" class="label m-t-10">Password</label>
                        <div class="field">
                            <b-radio name="password_options" v-model="password_options" native-value="keep">Do Not Change Password</b-radio>
                        </div>
                        <div class="field">
                            <b-radio name="password_options" v-model="password_options" native-value="auto">Auto-Generate New Password</b-radio>
                        </div>
                        <div class="field">
                            <b-radio name="password_options" v-model="password_options" native-value="manual">Manually Set New Password</b-radio>
                        </div> 
                    </div>
                    <p class="control">
                        <input type="password" class="input" name="password" id="password" v-if="password_options == 'manual'" placeholder="Manually Add A Password">
                    </p>
            </div>
            <div class="column">
                <div class="field">
                    <label for="name" class="label m-t-10">Roles</label>
                </div>
                <input type="hidden" name="roles" :value="rolesSelected" />
                {{-- Getting id of all roles to compare with id of current user id roles if yes then this will be checked automatically --}}
                @foreach ($roles as $role)
                <div class="field">
                    <b-checkbox :value="true" v-model="rolesSelected" type="is-success" native-value="{{$role->id}}" > 
                        {{$role->display_name}}
                    </b-checkbox>
                </div>
                @endforeach
            </div>
    </div>
    <div class="columns">
        <div class="column has-text-centered">
                <hr/>
            <button class="is-success button" style="width:30%">Save User Detials</button>
        </div>
    </div>
</form>
    
</div>
             

@endsection

@section('scripts')
  <script>
    let app = new Vue({
        el: '#app', //element
        data: {
            password_options : 'keep',
            rolesSelected: {!! $user->roles->pluck('id') !!} // get all ids of the current user role to compare with id of all roles
        }
    });
  </script>  
@endsection