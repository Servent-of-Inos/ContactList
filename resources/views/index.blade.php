<!DOCTYPE html>

<html>

    <head>

        <title>Contact List</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">

    </head>

    <body>

        <div class="container">

        <div id="target" class="row">

            <div class="col-xs-4">
                <h1 class="page-header">Contact List</h1>

            </div>
           
            <div class="col-sm-12">

                @if(Auth::check())
                    
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#create">
                    Add New Contact
                    </a>

                     <a class="btn btn-primary pull-right" href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>

                    <mark class= "pull-right" > {{ "Hello, " . auth()->user()->name }} </mark>
                @else

                    <a href="/home" class="btn btn-primary pull-right">
                        Login
                    </a> 

                @endif 

                <table class="table table-hover table-striped">
                    
                    <thead>

                        <tr>
                            <th>№</th>
                            <th>Name</th>
                            <th>Phone number</th>
                            <th colspan="2">
                                &nbsp;
                            </th>
                        </tr>

                    </thead>

                    <tbody>
                        <tr v-for="contact in contacts">

                            <td>@{{ contact.id }}</td>
                            <td>@{{ contact.name }}</td>
                            <td>@{{ contact.phone_number }}</td>

                            <td width="10px">
                                <a href="#" class="btn btn-info" v-on:click.prevent="getContact(contact)">
                                Show
                                </a>
                            </td>
                            
                            @if(Auth::check())
                                <td width="10px">
                                    <a href="#" class="btn btn-warning btn-sm" v-on:click.prevent="editContact(contact)">Edit</a>
                                </td>
                                <td width="10px">
                                    <a href="#" class="btn btn-danger btn-sm" v-on:click.prevent="deleteContact(contact)">Delete</a>
                                </td>
                            @endif

                        </tr>

                    </tbody>
                </table>

                @include('partials.create')
                @include('partials.edit')
                @include('partials.show')
            </div>
        </div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>

</html>