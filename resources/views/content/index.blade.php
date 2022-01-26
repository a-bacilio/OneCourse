<x-app-layout>
    <div class="p-2 mx-auto mt-5 max-w-7xl">
        @if($course->lessons_count>0)
        <h1 class="text-3xl font-bold">Contenidos</h1>
        <h2>Contenido <i class="fas fa-greater-than"></i> {{ $course->name }} <i class="fas fa-greater-than"></i>
            {{ $lesson_now->section->name }} <i class="fas fa-greater-than"></i>
            {{ $lesson_now->name }} </h2>

        <div class="grid w-full grid-cols-1 gap-6 my-5 sm:grid-cols-4">
            {{-- Contenido --}}
            <article class="w-full col-span-1 p-2 bg-white rounded-lg sm:col-span-3">
                <h3 class="my-4 text-2xl font-bold">
                    {{ $lesson_now->section->name }}.
                    <br>
                    {{ $lesson_now->name }}
                    <h3>
                        <p>
                            {{ $lesson_now->description }}
                        </p>

                        @if ($lesson_now->resources_count == 0)
                            <p> Este lección no tiene recursos</p>
                        @else
                            @forelse ($resources as $key => $resource)
                                @if ($resource->lesson_id == $lesson_now->id)
                                    <div class="mt-5">
                                        <div class="p-4 mx-2 mt-5 rounded-lg bg-sky-200">{{ $resource->name }}</div>
                                        <div class="">
                                            @if ($resource->type == 'image')
                                                <img class="mx-auto my-3"
                                                    src="{{ asset($resource->image->url) }}" />
                                            @elseif ($resource->type == 'video')
                                                <div class="flex flex-row justify-center w-full my-3">
                                                    {!! $resource->online_video->iframe !!}</div>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            @empty
                                <p> Este lección no tiene recursos</p>
                            @endforelse
                        @endif

                        <div class="flex flex-row justify-between">
                            @if ($position > 1)
                                <form class="" method="POST" action={{ route('content.update') }}>
                                    @csrf
                                    <input value="previous" name="buttonaction" hidden>
                                    <button class="p-2 text-white bg-blue-700 rounded-lg"
                                        type="submit">Anterior</button>
                                </form>
                            @endif
                            @if ($position < $course->lessons_count)
                                <form class="" method="POST" action={{ route('content.update') }}>
                                    @csrf
                                    <input value="next" name="buttonaction" hidden>
                                    <button class="p-2 text-white bg-blue-900 rounded-lg"
                                        type="submit">Siguiente</button>
                                </form>
                            @endif
                        </div>




            </article>

            {{-- Navegacion lateral --}}

            <div class="flex flex-col w-full col-span-1 p-2 overflow-hidden text-xs bg-white rounded-lg">
                @forelse ($sections as $key => $section)
                    <div class="my-2" x-data="{ open: false }">
                        <h3 class="p-2 font-bold text-white bg-blue-600 rounded-lg" x-on:click="open = ! open">
                            {{ $section->name }} <i class="fas fa-caret-down"></i></h3>
                        <div class="w-full" x-show="open">
                            @if ($section->lessons_count == 0)
                                <div class="w-full p-2 mt-2 border rounded-lg">
                                    No hay lecciones
                                </div>
                            @else
                                @foreach ($lessons as $key => $lesson)
                                    @if ($lesson->section_id == $section->id)
                                        <form
                                            class="w-full rounded-lg p-2 mt-2 border {{ $key <= Auth::user()->lesson_max ? 'text-black' : 'text-gray-400' }} {{ $key == Auth::user()->lesson_now ? 'bg-blue-400' : 'bg-blue-200' }}"
                                            method="POST" action={{ route('content.updatespecific') }}>
                                            @csrf
                                            <input value={{ $key }} name="lesson" hidden>
                                            <button class="text-left" type="submit">{{ $lesson->name }}</button>
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
                @if (Auth::user()->lesson_max == $course->lessons_count - 1)
                    <a href="{{ route('content.showevaluation') }}"
                        class="w-full p-2 my-2 font-bold text-black bg-yellow-300 rounded-lg">Evaluacion final</a>
                @endif
                @if (Auth::user()->usability == 1)
                    <a href="{{ route('content.showcertification') }}"
                        class="w-full p-2 my-2 font-bold text-black bg-purple-300 rounded-lg">Certificado</a>
                @endif
            </div>

        </div>

        @else
            No hay lecciones en este curso
        @endif
    </div>
</x-app-layout>
