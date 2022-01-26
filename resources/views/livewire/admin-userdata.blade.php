<div class="card">
    <div class="card-header">
        <a target="_blank" href="{{route('admin.data.users.download')}}">
            <button type="button" class="btn btn-primary">
                <i class="fas fa-down"></i> Descargar data Usuarios
            </button>
        </a>
        <a target="_blank" href="{{route('admin.data.sus.download')}}">
            <button type="button" class="btn btn-primary">
                <i class="fas fa-down"></i> Descargar data evalaución SUS
            </button>
        </a>
        <a target="_blank" href="{{route('admin.data.csuq.download')}}">
            <button type="button" class="btn btn-primary">
                <i class="fas fa-down"></i> Descargar data evalaución CSUQ
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
                    <th class="col-1" scope="col">id</th>
                    <th class="col-1">Nombre</th>
                    <th class="col-1">Correo</th>
                    <th class="col-1">Género</th>
                    <th class="col-1">Fecha de Nacimiento</th>
                    <th class="col-1">Nivel de educacion</th>
                    <th class="col-1">Estado civil</th>
                    <th class="col-1">ocupacion</th>
                    <th class="col-1">Pais</th>
                    <th class="col-1">Provincia</th>
                    <th class="col-1">Distrito</th>
                    <th class="col-1">Tuvo familiar con covid</th>
                    <th class="col-1">Cuidado propio</th>
                    <th class="col-1">Cudiado Profesional</th>
                    <th class="col-1">Leccion máxima</th>
                    <th class="col-1">Dio evaluacion?</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->gender }}</td>
                        <td>{{ $user->birth_date }}</td>
                        <td>{{ $user->education_level }}</td>
                        <td>{{ $user->civil_status }}</td>
                        <td>{{ $user->occupation }}</td>
                        <td>{{ $user->residence_state }}</td>
                        <td>{{ $user->residence_province }}</td>
                        <td>{{ $user->residence_district }}</td>
                        <td>{{ $user->covid_family }}</td>
                        <td>{{ $user->caretaker_you }}</td>
                        <td>{{ $user->caretaker_pro }}</td>
                        <td>{{ $user->lesson_max }}</td>
                        <td>{{ $user->usability }}</td>
                    </tr>
                @empty
                    <tr class="col-span-2">
                        <td colspan="2"> No hay elementos</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
</div>
