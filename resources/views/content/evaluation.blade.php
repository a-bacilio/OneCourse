<x-app-layout>
    @php
        $lesson_now = $course->lessons[Auth::user()->lesson_now];
        $sus_qs=[
            [
                'value'=>'Pienso que usaria este sistema frecuentemente',
                'name'=>'sus1'
            ],
            [
                'value'=>'Encuentro el sistema simple',
                'name'=>'sus2'
            ],
            [
                'value'=>'El sistema fue facil de usar',
                'name'=>'sus3'
            ],
            [
                'value'=>'Necesito la ayudad de personal técnico para realizar las tareas',
                'name'=>'sus4'
            ],
            [
                'value'=>'Encontre que varias de las funciones estan bien integradas',
                'name'=>'sus5'
            ],
            [
                'value'=>'Encontre mucha consistencia en el sistema',
                'name'=>'sus6'
            ],
            [
                'value'=>'Pienso que este sistema seria facil de aprender',
                'name'=>'sus7'
            ],
            [
                'value'=>'Pienso que aprender a usar este sistema no seria ni una molestia',
                'name'=>'sus8'
            ],
            [
                'value'=>'Tengo confianza al usar este sistema',
                'name'=>'sus9'
            ],
            [
                'value'=>'No necesito aprender varias cosas antes de usar este sistema',
                'name'=>'sus10'
            ],
        ];
        $csuq_qs=[
            [
                'value'=>'En general estoy satisfecho  con lo facil que es utilizar este sitio web',
                'name'=>'csuq1'
            ],
            [
                'value'=>'Fue simple usar este sitio web',
                'name'=>'csuq2'
            ],
            [
                'value'=>'Soy capaz de completar los objetivos, utilizando el sistio web',
                'name'=>'csuq3'
            ],
            [
                'value'=>'Me siento comodo utilziando este sitio web',
                'name'=>'csuq4'
            ],
            [
                'value'=>'Fue fácil aprender a utilizar el sistema del sitio web',
                'name'=>'csuq5'
            ],
            [
                'value'=>'Creo que me volví experto rapidamente utilizando el sistema del sitio web',
                'name'=>'csuq6'
            ],
            [
                'value'=>'El sitio web muestra mensajes de error utilizando el sistema lo resuelvo facil y rapidamente',
                'name'=>'csuq7'
            ],
            [
                'value'=>'Cada vez que cometo un error en el sistema actual, lo resuelvo fácil y rápidamente',
                'name'=>'csuq8'
            ],
            [
                'value'=>'La  información (como  ayuda en  línea,  mensajes  en pantalla y otra documentación) que provee  este sitio web es clara',
                'name'=>'csuq9'
            ],
            [
                'value'=>'Es fácil encontrar  en el sitio  web la información que necesito.',
                'name'=>'csuq10'
            ],
            [
                'value'=>'La  información  que  proporciona  el  sitio  web  fue efectiva ayudándome a completar las tareas.',
                'name'=>'csuq11'
            ],
            [
                'value'=>'La organización de la información del sitio web en la pantalla fue clara.',
                'name'=>'csuq12'
            ],
            [
                'value'=>'La interfaz del sitio web fue placentera. ',
                'name'=>'csuq13'
            ],
            [
                'value'=>'Me gustó utilizar el sitio web.',
                'name'=>'csuq14'
            ],
            [
                'value'=>'El sitio web tuvo todas las herramientas que esperaba que tuviera.',
                'name'=>'csuq15'
            ],
            [
                'value'=>'En general, estuve satisfecho con el sitio web. ',
                'name'=>'csuq16'
            ],
        ];
    @endphp
    <div class="p-2 mx-auto mt-5 max-w-7xl">
        <h1 class="text-3xl font-bold">Evaluación final</h1>

        <div class="grid w-full grid-cols-1 gap-6 my-5 sm:grid-cols-4">
            {{-- Evaluacion --}}
            <article class="w-full col-span-1 p-5 bg-white rounded-lg sm:col-span-3">

                <x-jet-validation-errors class="mb-4" />

                <h1 class="text-xl font-bold">1. Evaluación de usabilidad I (SUS)</h1>
                <form class="flex flex-col w-full" method="POST" action={{route('content.registerevaluation')}}>
                    @csrf
                    <p>A continuación, del 1 al 5 que tanto de acuerdo se encuentra con los enunciados donde 1 es totalmente en desacuerdo y 5  es totalmente de aceurdo.</p>
                    @foreach( $sus_qs as $key => $sus_q )
                        <div class="flex flex-row items-center w-full p-2 mt-5 border border-blue-900 rounded-lg justify between">
                            <x-jet-label class="w-full col-span-1" for="{{$sus_q['name']}}" value="{{$key+1}}. {{$sus_q['value']}}" />
                            <x-jet-input class="float-right w-28" id="{{$sus_q['name']}}" type="number" min="0" max="5" name="{{$sus_q['name']}}" :value="old($sus_q['name'])" required autofocus />
                        </div>
                    @endforeach


                <h1 class="mt-5 text-xl font-bold">2. Evaluación de usabilidad II (CSUQ)</h1>

                    <p>A continuación, del 1 al 7 que tanto de acuerdo se encuentra con los enunciados donde 1 es totalmente en desacuerdo y 7  es totalmente de aceurdo.</p>
                    @foreach( $csuq_qs as $key => $csuq_q )
                        <div class="flex flex-row items-center w-full p-2 mt-5 border border-blue-900 rounded-lg justify between">
                            <x-jet-label class="w-full col-span-1" for="{{$csuq_q['name']}}" value="{{$key+1}}. {{$csuq_q['value']}}" />
                            <x-jet-input class="float-right w-28" id="{{$csuq_q['name']}}" type="number" min="0" max="5" name="{{$csuq_q['name']}}" :value="old($csuq_q['name'])" required autofocus />
                        </div>
                    @endforeach


                    <button class="p-2 mx-auto my-10 text-white bg-blue-900 rounded-lg" type="submit">Enviar respuestas</button>
                </form>
            </article>






            {{-- Navegacion lateral --}}

            <div class="flex flex-col w-full col-span-1 p-2 overflow-hidden text-xs bg-white rounded-lg">
                @forelse ($sections as $key => $section)
                    <div class="my-2" x-data="{ open: false }">
                        <h3 class="p-2 font-bold text-white bg-blue-600 rounded-lg" x-on:click="open = ! open">
                            {{ $key + 1 }}. {{ $section->name }} <i class="fas fa-caret-down"></i></h3>
                        <div class="w-full" x-show="open">
                            @if ($section->lessons_count == 0)
                                <div class="w-full p-2 mt-2 border rounded-lg">
                                    No hay lecciones
                                </div>
                            @else
                                @foreach ($lessons as $key => $lesson)
                                    @if ($lesson->section_id == $section->id)
                                        <form
                                            class="w-full rounded-lg p-2 mt-2 border {{ $key <= Auth::user()->lesson_max ? 'text-black' : 'text-gray-400' }} {{ $key == Auth::user()->lesson_now? 'bg-blue-400' : 'bg-blue-200' }}"
                                            method="POST" action={{ route('content.updatespecific') }}>
                                            @csrf
                                            <input value={{ $key }} name="lesson" hidden>
                                            <button class="text-left" type="submit">L.{{$key+1}} - {{ $lesson->name }}</button>
                                        </form>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="my-5">
                        No hay secciones aún
                    </div>
                @endforelse
                @if(Auth::user()->lesson_max==$course->lessons_count-1)
                    <a href="{{route('content.showevaluation')}}" class="w-full p-2 my-2 font-bold text-black bg-yellow-300 rounded-lg">Evaluacion final</a>
                @endif
                @if(Auth::user()->usability==1)
                    <a href="{{route('content.showcertification')}}" class="w-full p-2 my-2 font-bold text-black bg-purple-300 rounded-lg">Certificado</a>
                @endif
            </div>

        </div>


    </div>
</x-app-layout>
