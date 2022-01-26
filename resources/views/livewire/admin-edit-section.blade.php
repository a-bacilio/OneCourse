<div class="card">
    <div class="card-body">
        <span class="">Lecciones en la seccion</span>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th class="col-1" scope="col">#</th>
                    <th scope="col-2">Name</th>
                    <th scope="col-1">Retire</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($lessons as $lesson)
                    <tr>
                        <th scope="row">{{ $lesson->id }}</th>
                        <td>{{ $lesson->name }}</td>
                        <td>
                            <i wire:click="removelesson({{ $lesson->id }})" style="color: yellow; margin:auto"
                                class="fas fa-arrow-circle-down"></i>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">
                            No hay lecciones
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-body">
        <span class="">Lecciones disponibles</span>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th class="col-1" scope="col">#</th>
                    <th scope="col-2">Name</th>
                    <th scope="col-1">Retire</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($lessons_nosection as $lesson)
                    <tr>
                        <th scope="row">{{ $lesson->id }}</th>
                        <td>{{ $lesson->name }}</td>
                        <td>
                            <i wire:click="addlesson({{ $lesson->id }})" style="color: green; margin:auto"
                                class="fas fa-arrow-circle-up"></i>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">
                            No hay lecciones
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
