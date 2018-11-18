@extends('layouts.manage')

@section('content')

<div class="flex-container">
    <div class="columns m-t-10">
        <div class="column">
            <h1 class="title">Edit {{$roles->display_name}}</h1>
        </div>
        <div class="column">
            <a href="{{route('roles.edit',$roles->id)}}" class="button is-primary pull-right"> <i class="fa fa-user m-r-10"></i> Edit Role</a>
        </div>
    </div>

    <hr class="m-t-10">
    <form action="{{route('roles.update',$roles->id)}}" method="POST">
        {{ csrf_field() }}
        {{method_field('PUT')}}
    <div class="columns">
        <div class="column">
            <div class="box">
                <article class="media">
                    <div class="media-content">
                        <div class="content">
                            <h2>Role Details:</h2>
                            <div class="field">
                                <p class="control">
                                    <label for="display_name">Name</label>
                                    <input type="text" name="display_name" class="input" value="{{$roles->display_name}}">
                                </p>
                            </div>
                            <div class="field">
                                <p class="control">
                                    <label for="name">Slug (cannot be edited)</label>
                                    <input type="text" name="name" class="input" value="{{$roles->name}}" disabled>
                                </p>
                            </div>
                            <div class="field">
                                <p class="control">
                                    <label for="description">Description</label>
                                    <input type="text" name="description" class="input" value="{{$roles->description}}">
                                </p>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>

    <div class="columns">
        <div class="column">
            <div class="box">
                <article class="media">
                    <div class="media-content">
                        <div class="content">
                            <h2>Permissions:</h2>
                            <div class="block">
                                @foreach ($permissions as $permission)
                                    <div class="field">
                                        <b-checkbox :value="true" v-model="permissionsSelected" type="is-success" native-value="{{$permission->id}}">
                                            {{$permission->display_name}} <em>{{$permission->description}}</em>
                                        </b-checkbox>
                                    </div>
                                @endforeach
                            </div>
                            <input type="hidden" :value=permissionsSelected name="permissions">
                        </div>
                    </div>
                </article>
            </div>

            <button class="button is-primary">Save changes to current role</button> 
        </div>
    </div>
    </form>
</div>

@endsection

@section('scripts')
  <script>
      let app = new Vue({
          el: '#app',
          data: {
              permissionsSelected : {!!$roles->permissions->pluck('id')!!} // since we cannot use {{}} here we use !! for escaping laravel content 
              //the pluck returns an array of values so it is like permissionsSelected : array(values,..)
          }
      });
  </script>  
@endsection