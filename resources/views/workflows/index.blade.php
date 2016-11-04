@extends('layouts.app')

@section('content')
    <div class="col-md-12">
    <h1>Workflows<span class="pull-right"><a class="btn btn-default" href="workflows/create">New</a></span></h1>
    
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th></th>
                </tr>
            </thead>        
            <tbody>
                @foreach ($workflows as $workflow)
                    <tr>
                        <td>{{ $workflow->id }}</td>
                        <td><a href="workflows/{{ $workflow->id }}">{{ $workflow->name }}</a></td>
                        <td>{{ $workflow->user->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>    
    </div>
@stop
