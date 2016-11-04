    <ul id="sortableTask{{ $step->id }}" class="list-group connectedSortable">
        @foreach ($step->tasks as $task)
        <li class="list-group-item">
            <p>{{ $task->description }}</p>
            @if( $task->body )
                <pre>{{ $task->body }}</pre>    
            @endif
        </li>
        @endforeach
    </ul>
