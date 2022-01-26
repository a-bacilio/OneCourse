<x-app-layout>
    @php
        $lesson_now = $course->lessons[Auth::user()->lesson_now];

    @endphp
    <div class="p-2 mx-auto mt-5 max-w-7xl">
        <h1 class="text-3xl font-bold">Certificación</h1>


        <div class="grid w-full grid-cols-1 gap-6 my-5 sm:grid-cols-4">
            {{-- Evaluacion --}}
            <article class="flex flex-col w-full col-span-1 p-5 bg-white rounded-lg sm:col-span-3">
                    <h1 class="my-2 text-3xl font-bold">{{$information->end_title}}</h1>
                    <br>
                    <p class="mt-5">{{$information->end_text_1}}</p>
                    <p class="mt-5">{{$information->end_text_2}}</p>
                    <a class="w-full p-2 mt-10 font-bold bg-purple-300 border rounded-lg" method="POST" target="_blank" href={{ route('content.generatecertification') }}>
                        <button class="text-left">Descargar certificado</button>
                    </a>
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
</x-app-layout>
