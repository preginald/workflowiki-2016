        @if($process->startNode->count() && ! $process->endNode->count() )
             <div class="panel panel-default">
                <div class="panel-body">
                    <a href="/options/{{ $option->id}}/activities/create/" class="btn btn-warning" role="button">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        End Activity
                    </a>
                </div>
             </div>
        @endif
