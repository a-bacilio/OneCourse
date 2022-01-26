<div class="card">
    <div class="card-header">
        <input wire:keydown:"limpiar_page" wire:model="search" class="form-control w-100" placeholder="Escriba un nombre ...">
    </div>
    <table class="table table-dark">
        <thead>
          <tr>
            <th class="col-1" scope="col">#</th>
            <th class="col-2">Name</th>
            <th class="col-md-1">Lección</th>
            <th class="col-md-1">Evaluacion</th>
            <th class="col-md-1">Rol</th>
            <th class="col-md-1">Admin/user</th>
            <th class="col-1">Eliminar user</th>


          </tr>
        </thead>
        <tbody>
            @foreach ($users as $user )
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->lesson_now+1}}</td>
                <td>{{$user->usability>0?'Si':'No'}}</td>
                <td>{{sizeof($user->roles)>0?'Admin':'Estudiante'}}</td>
                <td>
                    <i class="fas fa-users-cog" style="color:cyan;"  wire:click="cambiarAdmin({{$user->id}})" ></i>
                </td>
                <td>
                    <i class="fas fa-user-times" style="color:red;"  wire:click="removeUser({{$user->id}})" ></i>
                </td>
            </tr>
        @endforeach

        </tbody>
      </table>

      {{$users->links()}}
</div>
