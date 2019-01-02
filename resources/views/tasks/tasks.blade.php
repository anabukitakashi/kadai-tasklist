<ul class="media-list">
    @foreach ($tasks as $task)
        <li class="media mb-3">
            <!--<img class="media-object rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">-->
            <div class="media-body ml-3">
                <div>
                    {!! link_to_route('users.show', $task->user->name, ['id' => $task->user->id]) !!} <span class="text-muted"> {{ $task->created_at }}</span>
                </div>
                <div>
                    
                <table>    
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>タスク</th>
                            <th>進　捗</th>
                            <th>担　当</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{!! link_to_route('tasks.show', $task->id, ['id' => $task->id]) !!}</td>
                            <td>{{ $task->content }}</td>
                            <td>{{ $task->status }}</td>
                            <td>{{ $user->name }}</td>
                        </tr>
                    </tbody>
                </table>
                    
                    
                </div>
                <div>
                    @if (Auth::id() == $task->user_id)
                        {!! Form::open(['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    @endif
                </div>
            </div>
        </li>
    @endforeach
</ul>
{{ $tasks->render('pagination::bootstrap-4') }}