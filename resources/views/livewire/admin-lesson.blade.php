<div class="card">
    <div class="card-header">
        <a href="{{route('admin.lesson.create')}}">
            <button type="button" class="btn btn-primary">
                <i class="fas fa-plus"></i> Añadir Lección
            </button>
        </a>
    </div>
    <div class="card-header">
        <input wire:keydown:"limpiar_page" wire:model="search" class="form-control w-100" placeholder="Escriba un nombre ...">
    </div>
    <div class="card-body">
        <table class="table table-dark">
            <thead>
              <tr>
                <th class="col-1" scope="col">#</th>
                <th scope="col-2">Name</th>
                <th scope="col-1">Editar</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($lessons as $lesson )
                <tr>
                    <th scope="row">{{$lesson->id}}</th>
                    <td>{{$lesson->name}}</td>
                    <td>
                        <a href="lesson/edit/{{$lesson->id}}" style="background-color:#00000000; border:none;" type="submit"><i class="fas fa-pencil-alt" style="color:yellow;"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
          </table>
          {{$lessons->links()}}
    </div>
</div>
