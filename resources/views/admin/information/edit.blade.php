@extends('adminlte::page')

@section('title', 'Panel Admin')

@section('content_header')
    <h1>
        Configurar información del sitio
    </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form class="mb-5 d-flex flex-column" method="POST" action="{{route('admin.information.update')}}">
                @csrf
                <input hidden name="field" value="welcome_title"/>
                <div class="flex-column flex-md-row d-flex justify-content-between">
                    <div
                        class="mt-3 flex-column flex-md-row d-flex justify-content-start col-12 col-md-9 align-items-stretch">
                        <label class="col-11 col-md-3" for="welcome_title">Mensaje de bienvenida</label>
                        <input style="height:80%;" class="col-11 col-md-8" type="text" name="welcome_title" value="{{$information->welcome_title}}">
                    </div>
                    <button class="mt-2 btn btn-primary col-11 col-md-3" type="submit">Cambiar mensaje de
                        bienvenida</button>
                </div>
                @error('welcome_title') <span class="text-danger">{{ $message }}</span> @enderror
            </form>
            <form class="mb-5 d-flex flex-column" method="POST" action="{{route('admin.information.update')}}">
                @csrf
                <input hidden name="field" value="welcome_text_1"/>
                <div class="flex-column flex-md-row d-flex justify-content-between">
                    <div
                        class="mt-3 flex-column flex-md-row d-flex justify-content-start col-12 col-md-9 align-items-stretch">
                        <label class="col-11 col-md-3" for="welcome_text_1">Texto de bienvenida 1</label>
                        <textarea style="height:80%;min-height:100px;" class="col-11 col-md-8" type="text" name="welcome_text_1">
                            {{$information->welcome_text_1}}
                        </textarea>
                    </div>
                    <button class="mt-2 btn btn-primary col-11 col-md-3" type="submit">Cambiar texto de bienvenida 1</button>
                </div>
                @error('welcome_text_1') <span class="text-danger">{{ $message }}</span> @enderror
            </form>
            <form class="mb-5 d-flex flex-column" method="POST" action="{{route('admin.information.update')}}">
                @csrf
                <input hidden name="field" value="welcome_text_2"/>
                <div class="flex-column flex-md-row d-flex justify-content-between">
                    <div
                        class="mt-3 flex-column flex-md-row d-flex justify-content-start col-12 col-md-9 align-items-stretch">
                        <label class="col-11 col-md-3" for="welcome_text_2">Texto de bienvenida 2</label>
                        <textarea style="height:80%;min-height:100px;" class="col-11 col-md-8" type="text" name="welcome_text_2">
                            {{$information->welcome_text_2}}
                        </textarea>
                    </div>
                    <button class="mt-2 btn btn-primary col-11 col-md-3" type="submit">Cambiar texto de bienvenida 2</button>
                </div>
                @error('welcome_text_2') <span class="text-danger">{{ $message }}</span> @enderror
            </form>
            <form class="mb-5 d-flex flex-column" method="POST" action="{{route('admin.information.update')}}">
                @csrf
                <input hidden name="field" value="welcome_video"/>
                <div class="flex-column flex-md-row d-flex justify-content-between">
                    <div
                        class="mt-3 flex-column flex-md-row d-flex justify-content-start col-12 col-md-9 align-items-stretch">
                        <label class="col-11 col-md-3" for="welcome_video">Iframe video de bienvenida</label>
                        <textarea style="height:80%;min-height:100px;" class="col-11 col-md-8" type="text" name="welcome_video">
                            {{$information->welcome_video}}
                        </textarea>
                    </div>
                    <button class="mt-2 btn btn-primary col-11 col-md-3" type="submit">Cambiar video de bienvenida</button>
                </div>
                @error('welcome_video') <span class="text-danger">{{ $message }}</span> @enderror
            </form>
            <form class="mb-5 d-flex flex-column" method="POST" action="{{route('admin.information.update')}}">
                @csrf
                <input hidden name="field" value="end_title"/>
                <div class="flex-column flex-md-row d-flex justify-content-between">
                    <div
                        class="mt-3 flex-column flex-md-row d-flex justify-content-start col-12 col-md-9 align-items-stretch">
                        <label class="col-11 col-md-3" for="end_title">Mensaje final</label>
                        <input style="height:80%;" class="col-11 col-md-8" type="text" name="end_title" value="{{$information->end_title}}">
                    </div>
                    <button class="mt-2 btn btn-primary col-11 col-md-3" type="submit">Cambiar mensaje final</button>
                </div>
                @error('end_title') <span class="text-danger">{{ $message }}</span> @enderror
            </form>
            <form class="mb-5 d-flex flex-column" method="POST" action="{{route('admin.information.update')}}">
                @csrf
                <input hidden name="field" value="end_text_1"/>
                <div class="flex-column flex-md-row d-flex justify-content-between">
                    <div
                        class="mt-3 flex-column flex-md-row d-flex justify-content-start col-12 col-md-9 align-items-stretch">
                        <label class="col-11 col-md-3" for="end_text_1">Texto de salida 1</label>
                        <textarea style="height:80%;min-height:100px;" class="col-11 col-md-8" type="text" name="end_text_1">
                            {{$information->end_text_1}}
                        </textarea>
                    </div>
                    <button class="mt-2 btn btn-primary col-11 col-md-3" type="submit">Cambiar texto de salida 1</button>
                </div>
                @error('end_text_1') <span class="text-danger">{{ $message }}</span> @enderror
            </form>
            <form class="mb-5 d-flex flex-column" method="POST" action="{{route('admin.information.update')}}">
                @csrf
                <input hidden name="field" value="end_text_2"/>
                <div class="flex-column flex-md-row d-flex justify-content-between">
                    <div
                        class="mt-3 flex-column flex-md-row d-flex justify-content-start col-12 col-md-9 align-items-stretch">
                        <label class="col-11 col-md-3" for="end_text_2">Texto de salida 2</label>
                        <textarea style="height:80%;min-height:100px;" class="col-11 col-md-8" type="text" name="end_text_2">
                            {{$information->end_text_2}}
                        </textarea>
                    </div>
                    <button class="mt-2 btn btn-primary col-11 col-md-3" type="submit">Cambiar texto de salida 2</button>
                </div>
                @error('end_text_2') <span class="text-danger">{{ $message }}</span> @enderror
            </form>
            <form class="mb-5 d-flex flex-column" method="POST" enctype="multipart/form-data" action="{{route('admin.information.update')}}">
                @csrf
                <input hidden name="field" value="logo"/>
                <div class="flex-column flex-md-row d-flex justify-content-between">
                    <div
                        class="mt-3 flex-column flex-md-row d-flex justify-content-start col-12 col-md-9 align-items-stretch">
                        <label class="col-11 col-md-3" for="logo">Logo (recargar con ctrl+f5)</label>
                        <img style="width:70px; margin:1rem auto;" src="{{asset('img/logo/logo.png')}}" />
                        <input type="file" style="object-fit: cover;" class="ml-3 mr-3 form-control-file" name="logo" placeholder="Seleccione una imagen"
                        accept="image/png" required>
                    </div>
                    <button class="mt-2 btn btn-primary col-11 col-md-3" type="submit">Cambiar Logo (PNG)</button>
                </div>
                @error('logo') <span class="text-danger">{{ $message }}</span> @enderror
            </form>
            <form class="mb-5 d-flex flex-column" method="POST" enctype="multipart/form-data" action="{{route('admin.information.update')}}">
                @csrf
                <input hidden name="field" value="black_logo"/>
                <div class="flex-column flex-md-row d-flex justify-content-between">
                    <div
                        class="mt-3 flex-column flex-md-row d-flex justify-content-start col-12 col-md-9 align-items-stretch">
                        <label class="col-11 col-md-3" for="black_logo">Logo oscuro (recargar con ctrl+f5)</label>
                        <img style="width:70px; margin:1rem auto;" src="{{asset('img/logo/black_logo.png')}}" />
                        <input type="file" style="object-fit: cover;" class="ml-3 mr-3 form-control-file" name="black_logo" placeholder="Seleccione una imagen"
                        accept="image/png" required>
                    </div>
                    <button class="mt-2 btn btn-primary col-11 col-md-3" type="submit">Cambiar logo oscuro (PNG)</button>
                </div>
                @error('black_logo') <span class="text-danger">{{ $message }}</span> @enderror
            </form>
            <form class="mb-5 d-flex flex-column" method="POST" enctype="multipart/form-data" action="{{route('admin.information.update')}}">
                @csrf
                <input hidden name="field" value="white_logo"/>
                <div class="flex-column flex-md-row d-flex justify-content-between">
                    <div
                        class="mt-3 flex-column flex-md-row d-flex justify-content-start col-12 col-md-9 align-items-stretch">
                        <label class="col-11 col-md-3" for="white_logo">Logo blanco (recargar con ctrl+f5)</label>
                        <img style="width:70px; margin:1rem auto; background-color:black;" src="{{asset('img/logo/white_logo.png')}}" />
                        <input type="file" style="object-fit: cover;" class="ml-3 mr-3 form-control-file" name="white_logo" placeholder="Seleccione una imagen"
                        accept="image/png" required>
                    </div>
                    <button class="mt-2 btn btn-primary col-11 col-md-3" type="submit">Cambiar logo blanco (PNG)</button>
                </div>
                @error('white_logo') <span class="text-danger">{{ $message }}</span> @enderror
            </form>
            <form class="mb-5 d-flex flex-column" method="POST" enctype="multipart/form-data" action="{{route('admin.information.update')}}">
                @csrf
                <input hidden name="field" value="consent_img_1"/>
                <div class="flex-column flex-md-row d-flex justify-content-between">
                    <div
                        class="mt-3 flex-column flex-md-row d-flex justify-content-start col-12 col-md-9 align-items-stretch">
                        <label class="col-11 col-md-3" for="consent_img_1">Pagina 1 del consentimiento informado (recargar con ctrl+f5)</label>
                        <img style="width:150px; margin:1rem auto; background-color:black;" src="{{asset('img/consent/1.png')}}" />
                        <input type="file" style="object-fit: cover;" class="ml-3 mr-3 form-control-file" name="consent_img_1" placeholder="Seleccione una imagen"
                        accept="image/png" required>
                    </div>
                    <button class="mt-2 btn btn-primary col-11 col-md-3" type="submit">Cambiar pagina 1 (PNG)</button>
                </div>
                @error('consent_img_1') <span class="text-danger">{{ $message }}</span> @enderror
            </form>
            <form class="mb-5 d-flex flex-column" method="POST" enctype="multipart/form-data" action="{{route('admin.information.update')}}">
                @csrf
                <input hidden name="field" value="consent_img_2"/>
                <div class="flex-column flex-md-row d-flex justify-content-between">
                    <div
                        class="mt-3 flex-column flex-md-row d-flex justify-content-start col-12 col-md-9 align-items-stretch">
                        <label class="col-11 col-md-3" for="consent_img_2">Pagina 2 del consentimiento informado (recargar con ctrl+f5)</label>
                        <img style="width:150px; margin:1rem auto; background-color:black;" src="{{asset('img/consent/2.png')}}" />
                        <input type="file" style="object-fit: cover;" class="ml-3 mr-3 form-control-file" name="consent_img_2" placeholder="Seleccione una imagen"
                        accept="image/png" required>
                    </div>
                    <button class="mt-2 btn btn-primary col-11 col-md-3" type="submit">Cambiar pagina 2 (PNG)</button>
                </div>
                @error('consent_img_2') <span class="text-danger">{{ $message }}</span> @enderror
            </form>
            <form class="mb-5 d-flex flex-column" method="POST" enctype="multipart/form-data" action="{{route('admin.information.update')}}">
                @csrf
                <input hidden name="field" value="consent_img_3"/>
                <div class="flex-column flex-md-row d-flex justify-content-between">
                    <div
                        class="mt-3 flex-column flex-md-row d-flex justify-content-start col-12 col-md-9 align-items-stretch">
                        <label class="col-11 col-md-3" for="consent_img_3">Pagina 3 del consentimiento informado (recargar con ctrl+f5)</label>
                        <img style="width:150px; margin:1rem auto; background-color:black;" src="{{asset('img/consent/3.png')}}" />
                        <input type="file" style="object-fit: cover;" class="ml-3 mr-3 form-control-file" name="consent_img_3" placeholder="Seleccione una imagen"
                        accept="image/png" required>
                    </div>
                    <button class="mt-2 btn btn-primary col-11 col-md-3" type="submit">Cambiar pagina 3 (PNG)</button>
                </div>
                @error('consent_img_3') <span class="text-danger">{{ $message }}</span> @enderror
            </form>
            <form class="mb-5 d-flex flex-column" method="POST" enctype="multipart/form-data" action="{{route('admin.information.update')}}">
                @csrf
                <input hidden name="field" value="certificate_img"/>
                <div class="flex-column flex-md-row d-flex justify-content-between">
                    <div
                        class="mt-3 flex-column flex-md-row d-flex justify-content-start col-12 col-md-9 align-items-stretch">
                        <label class="col-11 col-md-3" for="certificate_img">Imagen de fondo del certificado</label>
                        <img style="width:150px; margin:1rem auto; background-color:black;" src="{{asset('img/certificate/diploma.jpg')}}" />
                        <input type="file" style="object-fit: cover;" class="ml-3 mr-3 form-control-file" name="certificate_img" placeholder="Seleccione una imagen"
                        accept="image/jpg" required>
                    </div>
                    <button class="mt-2 btn btn-primary col-11 col-md-3" type="submit">Cambiar certificado (JPG)</button>
                </div>
                @error('certificate_img') <span class="text-danger">{{ $message }}</span> @enderror
            </form>
            <form class="mb-5 d-flex flex-column" method="POST" action="{{route('admin.information.update')}}">
                @csrf
                <input hidden name="field" value="certificate_fontsize"/>
                <div class="flex-column flex-md-row d-flex justify-content-between">
                    <div
                        class="mt-3 flex-column flex-md-row d-flex justify-content-start col-12 col-md-9 align-items-stretch">
                        <label class="col-11 col-md-3" for="certificate_fontsize">Tamaño de fuente</label>
                        <input style="height:80%;" class="col-11 col-md-8" type="text" name="certificate_fontsize" value="{{$information->certificate_fontsize}}">
                    </div>
                    <button class="mt-2 btn btn-primary col-11 col-md-3" type="submit">Cambiar tamaño de fuente</button>
                </div>
                @error('certificate_fontsize') <span class="text-danger">{{ $message }}</span> @enderror
            </form>
            <form class="mb-5 d-flex flex-column" method="POST" action="{{route('admin.information.update')}}">
                @csrf
                <input hidden name="field" value="certificate_pos_x"/>
                <div class="flex-column flex-md-row d-flex justify-content-between">
                    <div
                        class="mt-3 flex-column flex-md-row d-flex justify-content-start col-12 col-md-9 align-items-stretch">
                        <label class="col-11 col-md-3" for="certificate_pos_x">Distancia del borde izquierdo</label>
                        <input style="height:80%;" class="col-11 col-md-8" type="text" name="certificate_pos_x" value="{{$information->certificate_pos_x}}">
                    </div>
                    <button class="mt-2 btn btn-primary col-11 col-md-3" type="submit">Cambiar distancia del borde izquierdo (1px, 1rem, 1inch, 1cm)</button>
                </div>
                @error('certificate_pos_x') <span class="text-danger">{{ $message }}</span> @enderror
            </form>
            <form class="mb-5 d-flex flex-column" method="POST" action="{{route('admin.information.update')}}">
                @csrf
                <input hidden name="field" value="certificate_pos_y"/>
                <div class="flex-column flex-md-row d-flex justify-content-between">
                    <div
                        class="mt-3 flex-column flex-md-row d-flex justify-content-start col-12 col-md-9 align-items-stretch">
                        <label class="col-11 col-md-3" for="certificate_pos_y">Distancia del borde superior</label>
                        <input style="height:80%;" class="col-11 col-md-8" type="text" name="certificate_pos_y" value="{{$information->certificate_pos_y}}">
                    </div>
                    <button class="mt-2 btn btn-primary col-11 col-md-3" type="submit">Cambiar distancia del borde superior (1px, 1rem, 1inch, 1cm)</button>
                </div>
                @error('certificate_pos_y') <span class="text-danger">{{ $message }}</span> @enderror
            </form>
        </div>
    </div>

@stop

@section('css')
@stop

@section('js')
    <script src="//unpkg.com/alpinejs" defer></script>
@stop
