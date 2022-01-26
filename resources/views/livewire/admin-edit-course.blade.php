<div class="card">
    <div class="card-body">
        <span class="">Secciones en el curso</span>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th class="col-1" scope="col">#</th>
                    <th scope="col-2">Name</th>
                    <th scope="col-1">Retire</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($sections as $section)
                    <tr>
                        <th scope="row">{{ $section->id }}</th>
                        <td>{{ $section->name }}</td>
                        <td>
                            <i wire:click="removesection({{ $section->id }})" style="color: yellow; margin:auto"
                                class="fas fa-arrow-circle-down"></i>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">
                            No hay secciones
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-body">
        <span class="">Secciones disponibles</span>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th class="col-1" scope="col">#</th>
                    <th scope="col-2">Name</th>
                    <th scope="col-1">Retire</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($sections_nocourse as $section)
                    <tr>
                        <th scope="row">{{ $section->id }}</th>
                        <td>{{ $section->name }}</td>
                        <td>
                            <i wire:click="addsection({{ $section->id }})" style="color: green; margin:auto"
                                class="fas fa-arrow-circle-up"></i>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">
                            No hay secciones
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
