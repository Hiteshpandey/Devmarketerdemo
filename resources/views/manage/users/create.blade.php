@extends('layouts.manage')

@section('content')

<div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Create New User</h1>
            </div>
        </div>
        <hr class="m-t-10">
        <div class="columns">
            <div class="column">
                <form action="{{route('users.store')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="field">
                        <label for="name" class="label m-t-10">Name</label>
                    </div>
                    <p class="control">
                        <input type="text" class="input" name="name" id="name">
                    </p>

                    <div class="field">
                        <label for="email" class="label m-t-10">Email</label>
                    </div>
                    <p class="control">
                        <input type="text" class="input" name="email" id="email">
                    </p>

                    <div class="field">
                        <label for="password" class="label m-t-10">Password</label>
                    </div>
                    <p class="control">
                        <input type="password" class="input" name="password" id="password" v-if="!auto_password" placeholder="Manually Add A Password">
                        <b-checkbox name="auto_generate" class="m-t-15 m-b-15" v-model="auto_password">Auto Generate Password</b-checkbox>
                    </p>
                    <button class="is-success button">Create User</button>
                </form>
            </div>
        </div>
    
</div>

@endsection

@section('scripts')
  <script>
    let app = new Vue({
        el: '#app', //element
        data: {
            auto_password : true
        }
    });
  </script>  
@endsection