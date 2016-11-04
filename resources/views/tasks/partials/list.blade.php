<div class="panel panel-info">
    <!-- Default panel contents -->
    <div class="panel-heading">
        This step has {{ $step->tasks->count() }} tasks.
    </div>

    <!-- List group -->
    <div class="list-group">
        @foreach ($step->tasks as $task)
            <a href="/tasks/{{ $task->id }}" class="list-group-item">
                <h4 class="list-group-i,em-heading">Task {{ $task->position }}: </h4>
                <p class="list-group-item-text" style="margin-bottom: 11px;">{{ $task->description }}</p> 

                @if($task->body)
                    <pre>{{ str_limit($task->body, 2047) }}</pre>
                @endif
            </a>
        @endforeach
    </div>
</div>
