<x-app-layout>
    <div class="flex flex-col w-full h-full mx-auto my-auto lg:items-start max-w-7xl lg:flex-row">

        <div class="flex flex-col justify-center w-5/6 mx-auto lg:flex-row">
            <div class="mx-auto md:w-11/12 lg:w-3/6">
                <h1 class="my-10 ml-5 text-4xl font-extrabold text-white" style="text-shadow: 1px 1px 2px black;">{{$information['welcome_title']}}</h1>
                <p class="p-5 text-justify text-shadow">
                    {{$information['welcome_text_1']}}
                </p>
                <p class="p-5 text-justify text-shadow">
                    {{$information['welcome_text_2']}}
                </p>
            </div>
            <div class="flex flex-row items-center content-center justify-center w-full my-auto lg:w-3/6 md:h-96">
                {!!$information['welcome_video']!!}
            </div>
        </div>
        <div class="p-5 mx-3 my-10 bg-yellow-100 lg:w-1/6">
            <div class="p-2 mt-2 text-center bg-white box-shadow">
                Fechas limites flexibles
            </div>
            <div class="p-2 mt-2 text-center bg-white box-shadow">
                Constancia para compartir
            </div>
            <div class="p-2 mt-2 text-center bg-white box-shadow">
                100% en linea
            </div>
            <div class="p-2 mt-2 text-center bg-white box-shadow">
                15 dias para completar
            </div>
            <div class="p-2 mt-2 text-center bg-white box-shadow">
                Español
            </div>
        </div>




    </div>
</x-app-layout>
