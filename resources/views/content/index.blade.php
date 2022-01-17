<x-app-layout>
    @php
        $lesson_now = $course->lessons[Auth::user()->lesson_now];
    @endphp
    <div class="p-2 mx-auto mt-5 max-w-7xl">
        <h1 class="text-3xl font-bold">Contenidos</h1>
        <h2>Contenido <i class="fas fa-greater-than"></i> {{ $course->name }} <i class="fas fa-greater-than"></i>
            {{ $lesson_now->section->name }} <i class="fas fa-greater-than"></i>
            {{ $lesson_now->name }} </h2>

        <div class="grid w-full grid-cols-1 gap-6 my-5 sm:grid-cols-4">
            {{-- Contenido --}}
            <article class="w-full col-span-1 p-2 sm:col-span-3">
                <h3 class="my-4 text-2xl font-bold"> Seccion
                    {{ $lesson_now->section->id }}.
                    {{ $lesson_now->name }} <h3>
                        @forelse  ($lesson_now->resources as $key=>$resource)
                            <div class="mt-5">
                                <span class="mt-5 font-bold">{{ $key + 1 }}. {{ $resource->name }}</span>
                                @if ($resource->type == 'image')
                                    <img class="mx-auto my-3"
                                        src="{{ asset('storage/' . $resource->image->url) }}" />
                                @elseif ($resource->type == 'video')
                                    <div class="flex flex-row justify-center w-full my-3">{!! $resource->online_video->iframe !!}</div>
                                @endif
                            </div>
                        @empty
                            <p> Este lección no tiene recursos</p>
                        @endforelse

                        <div class="flex flex-row justify-between">
                            @if ($lesson_now->id > 1)
                                <form class="" method="POST" action={{ route('content.update') }}>
                                    @csrf
                                    <input value="previous" name="buttonaction" hidden>
                                    <button class="p-2 text-white bg-blue-700 rounded-lg"
                                        type="submit">Anterior</button>
                                </form>
                            @endif
                            @if ($lesson_now->id < $course->lessons_count)
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

            <div class="w-full col-span-1 p-2 overflow-hidden text-xs bg-white rounded-lg">
                @forelse ($course->sections as $key => $section)
                    <div class="my-5" x-data="{ open: false }">
                        <h3 class="p-2 font-bold text-white bg-blue-600 rounded-lg" x-on:click="open = ! open">
                            {{ $key + 1 }}. {{ $section->name }} <i class="fas fa-caret-down"></i></h3>
                        <div class="w-full" x-show="open">
                            @forelse ($section->lessons as $key => $lesson)
                                <form class="w-full rounded-lg p-2 mt-2 border {{ $lesson->id < Auth::user()->lesson_max + 2 ? 'text-black' : 'text-gray-400' }} {{ $lesson->id == Auth::user()->lesson_now + 1 ? 'bg-blue-400' : 'bg-blue-200' }}" method="POST" action={{ route('content.updatespecific') }}>
                                    @csrf
                                    <input value={{$lesson->id}} name="lesson" hidden>
                                    <button class="text-left"
                                        type="submit">{{ $section->id }}.{{ $key + 1 }} {{ $lesson->name }}</button>
                                </form>
                            @empty
                                <div class="w-full p-2 mt-2 border rounded-lg">
                                    No hay lecciones
                                </div>
                            @endforelse
                        </div>
                    </div>
                @empty
                    <div class="my-5">
                        No hay secciones aún
                    </div>
                @endforelse
            </div>

        </div>


    </div>
</x-app-layout>
