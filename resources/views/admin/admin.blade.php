@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2>Pages</h2>
            <table class="table table-striped table-bordered table-hover">
                <tr><th>Name</th><th>Description</th><td>edit</td></tr>
                @foreach($pages as $page)
                    <td>{{$page['name']}}</td>
                    <td>{{$page['description']}}</td>
                    <td><a href="page_edit/{{$page['id']}}">Edit</a></td>
                    </tr>

                @endforeach
            </table>
        </div>
    </div>


@endsection
