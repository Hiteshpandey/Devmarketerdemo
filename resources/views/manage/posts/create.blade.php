@extends('layouts.manage')

@section('content')

<div class="flex-container">
    <div class="columns m-t-10">
        <div class="column">
            <h1 class="title">Add New Blog Post</h1>
        </div>
        {{-- <div class="column">
            <a href="{{route('users.create')}}" class="button is-primary pull-right"> <i class="fa fa-user-plus m-r-10"></i> Create New User</a>
        </div> --}}
    </div>

    <hr class="m-t-10">

    <form action="{{route('posts.store')}}" method="post">
        {{ csrf_field() }}
        <div class="columns">
            <div class="column is-three-quarter-desktop">
                <b-field>
                    <b-input placeholder="Post Title" size="is-large">
                    </b-input>
                </b-field>
                <p>{{ url('/blog') }}</p>
                <b-field>
                    <b-input type="textarea" placeholder="Post Content..." size="is-large">
                    </b-input>
                </b-field>
            </div>
            <div class="column is-one-quarter-desktop is-narrow-tablet">
                <div class="card card-widget">
                    <div class="author-widget widget-area">
                        <div class="selected-author">
                            <img src="https://placehold.it/50x50">
                            <div class="author">
                                <h4>Some text</h4>
                                <p class="subtitle">
                                    subtitle
                                </p>
                            </div>
                            
                        </div>
                    </div>
                    <div class="post-status-widget widget-area">
                        <div class="status">
                            <div class="status-icon">
                                <b-icon  pack="fa" icon="file-text"></b-icon>
                            </div>
                            <div class="status-details">
                                <h4>Draft</h4>
                                <p>Saved a few minutes ago</p>
                            </div>
                        </div>
                    </div>
                    <div class="publish-button-widget widget-area">
                        <div class="secondary-action-button">
                            <button class="button is-info is-outlined is-fullwidth">Save Draft</button>
                        </div>
                        <div class="primary-action-button">
                            <button class="button is-primary is-fullwidth">Publish</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
{{-- flex container ends --}}

@endsection

@section('scripts')
    <script>
        var app = new Vue({
            el: "#app",
            data: {}
        });
    </script>
@endsection