@extends('layouts.manage')

@section('content')
@if ($errors->any())
    @foreach ($errors->all() as $item)
    {
        {{$item}}
    }
    @endforeach
@endif
<div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Create New Permission</h1>
            </div>
        </div>
        <hr class="m-t-10">
        <div class="columns">
            <div class="column">
                <form action="{{route('permissions.store')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="block">
                        <div class="field">
                            <b-radio name="permission_type" v-model="permission_type" native-value="basic">Basic Permission</b-radio>
                        </div>
                        <div class="field">
                            <b-radio name="permission_type" v-model="permission_type" native-value="crud">CRUD Permission</b-radio>
                        </div> 
                    </div>
                    <div class="field" v-if="permission_type == 'basic'"> 
                        {{-- vif condition is true then display the field else not --}}
                        <div class="field">
                            <label for="display_name" class="label m-t-10">Name (Display Name)</label>
                        </div>
                        <p class="control">
                            <input type="text" class="input" name="display_name" id="display_name">
                        </p>
                    </div>

                    <div class="field" v-if="permission_type == 'basic'">
                        <div class="field">
                            <label for="slug" class="label m-t-10">Slug</label>
                        </div>
                        <p class="control">
                            <input type="text" class="input" name="slug" id="slug">
                        </p>
                    </div>
                    <div class="field" v-if="permission_type == 'basic'">
                        <div class="field">
                            <label for="description" class="label m-t-10">Description</label>
                        </div>
                        <p class="control">
                            <input type="text" class="input" name="description" id="description" placeholder="Describe What Permission Does">
                        </p>
                    </div>
                        <div class="field" v-if="permission_type == 'crud'">
                            <div class="field">
                                <label for="resource" class="label m-t-10">Resource</label>
                            </div>
                            <p class="control">
                                <input type="text" class="input" v-model="resource" name="resource" id="resource" placeholder="Name of the resource">
                            </p>
                        </div>
                            <div class="m-t-10" v-if="permission_type == 'crud'">
                                {{-- the check box values are set by elements in the crudselected array --}}
                                <div class="field">
                                    <b-checkbox :value="true" v-model="crudSelected" type="is-success" native-value="create">
                                        Create
                                    </b-checkbox>
                                </div>
                                <div class="field">
                                    <b-checkbox :value="true" v-model="crudSelected" type="is-success" native-value="read">
                                        Read
                                    </b-checkbox>
                                </div>
                                <div class="field">
                                    <b-checkbox :value="true" v-model="crudSelected" type="is-success" native-value="update">
                                        Update
                                    </b-checkbox>
                                </div>
                                <div class="field">
                                    <b-checkbox :value="true" v-model="crudSelected" type="is-success" native-value="delete">
                                        Delete
                                    </b-checkbox>
                                </div>
                            </div>
                            <input v-if="permission_type == 'crud'" type="hidden" name="crud_selected" :value="crudSelected"> 
                            {{-- this input will contain the selected values array --}}
                            <div class="column"  v-if="permission_type == 'crud'">
                                <table class="table">
                                    <thead>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Description</th>
                                    </thead>
                                    <tbody v-if="resource.length > 3">
                                        <tr v-for="item in crudSelected"> 
                                            {{-- looping in crudSelected array in the vue object --}}
                                            <td v-text="crudName(item)"></td>
                                            <td v-text="crudSlug(item)"></td>
                                            <td v-text="crudDescription(item)"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        <button class="is-success button m-t-10">Create Permission</button>
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
           permission_type : 'basic', // by defalut this value is set
           resource: '', // this will populate when we input the resource names
           crudSelected: ['create','read','update','delete'] // for the dynamic table we want to show crud functions for the given resource
        },
        methods:{
            crudName: function(item){
               return item[0].toUpperCase() + item.slice(1) +" "+this.resource[0].toUpperCase() + this.resource.slice(1); //basically concatinating item element with the resource and making the first letter of the two strings capital
            },
            crudSlug: function(item){
               return item.toLowerCase()+"-"+this.resource.toLowerCase();
            },
            crudDescription: function(item){
                return "Allow user to "+item[0].toUpperCase() + item.slice(1) +" a "+this.resource[0].toUpperCase() + this.resource.slice(1); //basically concatinating item element with the resource and making the first letter of the two strings capital
            }
        }
    });
  </script>  
@endsection