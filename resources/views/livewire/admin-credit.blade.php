<div class="card">
    <div class="card-header">
        <a href="{{ route('admin.credit.create') }}">
            <button type="button" class="btn btn-primary">
                <i class="fas fa-plus"></i> Añadir Creditos
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
                    <th class="">role</th>
                    <th class="col-2">description</th>
                    <th class="col-1">picture</th>
                    <th class="">id</th>
                    <th class="col-1">Accion</th>

                </tr>
            </thead>
            <tbody>
                @forelse ($credits as $credit)
                    <tr>
                        <th scope="row">{{ $credit->order }}</th>
                        <td>{{ $credit->name }}</td>
                        <td>{{ $credit->role }}</td>
                        <td>{{ $credit->description }}</td>
                        <td><img style="width:50px;height:50px;" src="{{asset($credit->picture)}}"  alt="{{$credit->name}}"></td>
                        <td>{{ $credit->id }}</td>
                        <td class="flex-row d-flex" >
                            <div>
                                <i wire:click="removeCredit({{$credit->id}})" style="color:red;" class="ml-1 fas fa-trash"></i>
                                <a href="{{route('admin.credit.edit',$credit->id)}}" class="ml-1"><i style="color:yellow;" class="fas fa-pencil-alt"></i></a>
                                @if($credit->order!==1)
                                    <i style="color:blue;"  wire:click="moveCreditUp({{$credit->id}})" class="ml-1 fas fa-arrow-circle-up"></i>
                                @endif
                                @if($credit->order!==sizeof($credits))
                                    <i style="color:blue;" wire:click="moveCreditDown({{$credit->id}})" class="ml-1 fas fa-arrow-circle-down"></i>
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
        {{ $credits->links() }}
    </div>
</div>
