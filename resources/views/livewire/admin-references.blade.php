<div class="card">
    <div class="card-header">
        <a href="{{ route('admin.reference.create') }}">
            <button type="button" class="btn btn-primary">
                <i class="fas fa-plus"></i> Añadir Referencias
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
                    <th class="">Name</th>
                    <th class="">id</th>
                    <th class="col-1">Accion</th>

                </tr>
            </thead>
            <tbody>
                @forelse ($references as $reference)
                    <tr>
                        <th scope="row">{{ $reference->order }}</th>
                        <td>{{ $reference->value }}</td>
                        <td>{{ $reference->id }}</td>
                        <td class="flex-row d-flex" >
                            <div>
                                <i wire:click="removeReference({{$reference->id}})" style="color:red;" class="ml-1 fas fa-trash"></i>
                                <a href="{{route('admin.reference.edit',$reference->id)}}" class="ml-1"><i style="color:yellow;" class="fas fa-pencil-alt"></i></a>
                                @if($reference->order!==1)
                                    <i style="color:blue;"  wire:click="moveReferenceUp({{$reference->id}})" class="ml-1 fas fa-arrow-circle-up"></i>
                                @endif
                                @if($reference->order!==sizeof($references))
                                    <i style="color:blue;" wire:click="moveReferenceDown({{$reference->id}})" class="ml-1 fas fa-arrow-circle-down"></i>
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
        {{ $references->links() }}
    </div>
</div>
