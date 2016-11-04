@extends('layouts.app')

@section('content')
    <!-- Process show -->
    <div class="col-md-8">
        <h2>{{ $process->name }}</h2> 
        <p>{{ $process->description }}</p>
        
        <div class="form-group">
            <a class="btn btn-default" role="button">
                <i class="fa fa-pencil" aria-hidden="true"></i>
                Edit Process
            </a>
            <a href="/processes/{{ $process->id}}/activities/create/" class="btn btn-default" role="button">
                <i class="fa fa-plus" aria-hidden="true"></i>
                Add Activity
            </a>
        </div>      

        <div>
            <hr />
            
            <form action="" method="post">
                <div class="form-group">
                    <label for="name">Process Name</label>
                    <input type="text" name="name" id="name" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="description">Process Description</label>
                    <textarea name="description" id="description" rows="3" cols="40" class="form-control"></textarea>
                </div>
            </form>
        </div>

    </div>
@stop
