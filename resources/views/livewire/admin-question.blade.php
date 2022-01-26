<div class="card">
    <div class="card-header">
        <a href="{{ route('admin.question.create') }}">
            <button type="button" class="btn btn-primary">
                <i class="fas fa-plus"></i> Añadir Preguntas Frecuentes
            </button>
        </a>
    </div>
    <div class="card-header">
        <input wire:keydown:"limpiar_page" wire:model="search" class="form-control w-100"
            placeholder="Escriba un nombre ...">
    </div>
    <div class="card-body">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th class="col-1" scope="col">Orden</th>
                    <th class="">Pregunta</th>
                    <th class="">Respuesta</th>
                    <th class="">id</th>
                    <th class="col-1">Accion</th>

                </tr>
            </thead>
            <tbody>
                @forelse ($questions as $question)
                    <tr>
                        <th scope="row">{{ $question->order }}</th>
                        <td>{{ $question->question }}</td>
                        <td>{{ $question->answer }}</td>
                        <td>{{ $question->id }}</td>
                        <td class="flex-row d-flex" >
                            <div>
                                <i wire:click="removeQuestion({{$question->id}})" style="color:red;" class="ml-1 fas fa-trash"></i>
                                <a href="{{route('admin.question.edit',$question->id)}}" class="ml-1"><i style="color:yellow;" class="fas fa-pencil-alt"></i></a>
                                @if($question->order!==1)
                                    <i style="color:blue;"  wire:click="moveQuestionUp({{$question->id}})" class="ml-1 fas fa-arrow-circle-up"></i>
                                @endif
                                @if($question->order!==sizeof($questions))
                                    <i style="color:blue;" wire:click="moveQuestionDown({{$question->id}})" class="ml-1 fas fa-arrow-circle-down"></i>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr class="col-span-2">
                       <td colspan="2"> No hay elementos</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $questions->links() }}
    </div>
</div>
