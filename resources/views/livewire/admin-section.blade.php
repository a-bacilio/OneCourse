<div class="card">
    <div class="card-header">
        <a href="{{route('admin.section.create')}}">
            <button type="button" class="btn btn-primary">
                <i class="fas fa-plus"></i> Añadir Sección
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
                <th scope="col-2">En uso</th>
                <th scope="col-1">Editar</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($sections as $section )
                <tr>
                    <th scope="row">{{$section->id}}</th>
                    <td>{{$section->name}}</td>
                    <td>{{$section->course_id==1?"Si":"No"}}</td>
                    <td>
                        <a href="section/edit/{{$section->id}}" style="background-color:#00000000; border:none;" type="submit"><i class="fas fa-pencil-alt" style="color:yellow;"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
          </table>
          {{$sections->links()}}
    </div>
</div>
