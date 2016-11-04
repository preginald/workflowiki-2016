@extends('layouts.app')

@section('content')
    <div class="col-md-12">
    <h1>Processes<span class="pull-right"><a class="btn btn-default" href="processes/create">New</a></span></h1>
    
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th></th>
                </tr>
            </thead>        
            <tbody>
                @foreach($processes as $process)
                    <tr>
                        <td>{{$process->id}}</td>
                        <td><a href="processes/{{$process->id}}">{{ $process->name }}</a></td>
                        <td>{{ $process->user->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>    
    </div>
@stop
