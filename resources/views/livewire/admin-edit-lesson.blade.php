<div class="card">
    <div class="card-body">
        <span class="">Recursos en la lección</span>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th class="col-1" scope="col">#</th>
                    <th scope="col-2">Name</th>
                    <th scope="col-1">Retire</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($resources as $resource)
                    <tr>
                        <th scope="row">{{ $resource->id }}</th>
                        <td>{{ $resource->name }}</td>
                        <td>
                            <i wire:click="removeResource({{ $resource->id }})" style="color: yellow; margin:auto"
                                class="fas fa-arrow-circle-down"></i>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">
                            No hay recursos
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-body">
        <span class="">Recursos disponibles</span>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th class="col-1" scope="col">#</th>
                    <th scope="col-2">Name</th>
                    <th scope="col-1">Retire</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($resources_nolesson as $resource)
                    <tr>
                        <th scope="row">{{ $resource->id }}</th>
                        <td>{{ $resource->name }}</td>
                        <td>
                            <i wire:click="addResource({{ $resource->id }})" style="color: green; margin:auto"
                                class="fas fa-arrow-circle-up"></i>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">
                            No hay recursos
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
