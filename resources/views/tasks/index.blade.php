@extends('layouts.app')

@section('content')
    @if (Auth::check())

        @if (Auth::id() == $user->id)

            <h1>タスク一覧</h1>

            @if (count($tasks) > 0)
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>タスク</th>
                            <th>進　捗</th>
                            <th>担　当</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                        <tr>
                            <td>{!! link_to_route('tasks.show', $task->id, ['id' => $task->id]) !!}</td>
                            <td>{{ $task->content }}</td>
                            <td>{{ $task->status }}</td>
                            <td>{{ $user->name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
    
            {{ $tasks->render('pagination::bootstrap-4') }}

            {!! link_to_route('tasks.create', '新規タスクの投稿', null, ['class' => 'btn btn-primary']) !!}    

        @endif

    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>タスク管理へようこそ</h1>
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection
