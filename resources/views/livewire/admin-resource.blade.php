<div class="card">
    <div class="card-header">
        <a href="{{route('admin.resource.createimage')}}">
            <button type="button" class="btn btn-primary">
                <i class="fas fa-image"></i> Añadir Imagen
            </button>
        </a>
        <a href="{{route('admin.resource.createvideo')}}">
            <button type="button" class="btn btn-primary">
                <i class="fab fa-youtube"></i> Añadir Video
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
                <th scope="col-2">Lección</th>
                <th scope="col-1">Tipo</th>
                <th scope="col-1">Muestra</th>
                <th scope="col-1"><br/></th>
              </tr>
            </thead>
            <tbody>
                @foreach ($resources as $resource )
                <tr>
                    <th scope="row">{{$resource->id}}</th>
                    <td>{{$resource->name}}</td>
                    <td>{{$resource->lesson_id}}</td>
                    <td>{{$resource->type}}</td>
                    @if($resource->type=='video')
                        <td>
                            <a target="_blank" href="{{$resource->online_video->url}}">
                                ver video
                            </a>
                        </td>
                    @elseif($resource->type=='image')
                        <td>
                            <img style="max-width:3rem; max-height:3rem;object-fit:cover; margin-x:auto; width:full;" src="{{ asset($resource->image->url) }}"/>
                        </td>
                    @endif
                    <td>
                        <form method="POST" action="{{route('admin.resource.destroyresource')}}">
                            @csrf
                            <input name="id" value="{{$resource->id}}" hidden/>
                            <button style="background-color:#00000000; border:none;" type="submit"><i class="fas fa-trash-alt" style="color:red;"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
          </table>
          {{$resources->links()}}
    </div>
</div>
