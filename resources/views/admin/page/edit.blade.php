@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2>Edit</h2>
            <form action="{{$action}}" method="post">

                {{ csrf_field() }}
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{$page['name']}}" required>
                <br>
                <input type="text" name="title" class="form-control" placeholder="Title" value="{{$page['title']}}" required>
                <br>
                <input type="text" name="description" class="form-control" placeholder="Description" value="{{$page['description']}}" required>
                <br>
                <button class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>


@endsection
