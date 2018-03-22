@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2>Modules</h2>
            <table class="table table-striped table-bordered table-hover">
                <tr><th>Name</th><th>Description</th><td>edit</td></tr>
                @foreach($modules as $module)
                    <td>{{$module['name']}}</td>
                    <td>{{$module['description']}}</td>
                    <td><a href="page_edit/{{$module['id']}}">Edit</a></td>
                    </tr>

                @endforeach
            </table>
        </div>
    </div>


@endsection
