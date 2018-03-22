@extends('layouts.app')

@section('content')
    <script src="{{ asset('js/vue.js') }}"></script>


    <div class="container" id="profile">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Profile</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @{{ log }}
                            <form v-on:submit="sub" action="#" method="post">
                                <ul style="list-style: none;">
                                    <li> Name:&nbsp;<input v-model="userData.name" required></li>
                                    <li> Email:&nbsp;<input v-model="userData.email" required></li>
                                    <li> Password:&nbsp;<input v-model="userData.password"></li>
                                    <li> Password Confirm:&nbsp;<input v-model="userData.conPassword"></li>
                                    <li><input type="submit" value="Update"></li>
                                </ul>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var app = new Vue({
            el: '#profile',
            data: {
                log : '',
                userData : {!! json_encode($user) !!}
            },
            methods: {

                sub: function(event){

                    this.log = "Go";
                    if(this.userData.email == "" ){

                        this.log = "Email is required";
                        event.preventDefault();
                    }
                    else if(this.userData.name == "")
                    {
                        this.log = "Name is required";
                        event.preventDefault();
                    }
                    else if(this.userData.password != this.userData.conPassword)
                    {
                        this.log = "Password must match Password confirm";
                        event.preventDefault();
                    }
                    else{
                        this.log = "Go";
                        event.preventDefault();
                    }
                }
            }
        })
    </script>

@endsection

