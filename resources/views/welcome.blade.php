@extends('layouts.main')

@section('title', 'TODOLIST')

@section('content')
<div class="title">
    <h1>To-do List</h1>
</div>
<div class="container">
    <div id="main-section">
        <div id="add-section">
            <form action="{{ route('create') }}" id="table" method="POST" autocomplete="off">
                @csrf
                <input type="text" class="bigbox" name="title" placeholder="Este campo é obrigatório" />
                <input type="text" class="bigbox" name="description" placeholder="Este campo é obrigatório" />
                <button type="submit"><ion-icon name="add-circle-outline"></ion-icon></button>
            </form>
        </div>
        <div id="show-search-section">
            <table class="table">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Descrição</th>
                        <th>Status</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                    <tr>
                        <td>{{$task->title}}</td>
                        <td><a href=""><ion-icon name="search"></ion-icon></a></td>
                        <td>
                            <form action="{{ route('markAsCompleted', ['task_id' => $task->id]) }}" method="POST">
                                @csrf
                                @method('POST')
                                <button type="submit"
                                    class="custom-button {{ $task->completed ? 'checkcircle' : 'checkclose' }}">
                                    <ion-icon name="checkmark-circle"></ion-icon>
                                </button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('delete', ['task_id' => $task->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="deleteButton">
                                    <ion-icon name="trash-outline"></ion-icon>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
