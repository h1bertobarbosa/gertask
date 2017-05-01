@extends('welcome')

@section('content')
<div class="list-group">
    <ul id="sortable" class="list-group">
    @foreach($tarefas as $tarefa)
        <li class="list-group-item">
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start ">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">{{ $tarefa->titulo }}</h5>
                <small>Prioridade {{ $tarefa->ordem }}</small>
            </div>
            <p class="mb-1">{{ $tarefa->descricao }}</p>
            </a>
        </li>
    @endforeach

        </ul>
</div>
@endsection

@section('javascript')
    <script>
        $( function() {
            $( "#sortable" ).sortable();
            $( "#sortable" ).disableSelection();
        });
    </script>
@endsection
