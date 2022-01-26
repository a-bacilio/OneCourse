<x-app-layout>
    <div class="flex flex-col w-full h-full mx-auto my-auto lg:items-start max-w-7xl lg:flex-row">
        <article class="flex flex-col w-11/12 min-h-screen p-6 mx-auto my-10 bg-white rounded-lg shadow-xl">
            <h1 class="text-3xl font-bold">
                Referencias:
            </h1>
            <article
                    class="flex flex-col items-start justify-start p-6 mt-6 border-4 border-black border-dashed rounded-lg min-w-90">
            @forelse ($references as $key => $reference)
                    <h2 class="mb-6 text-sm font-bold">
                        {{$reference->value}}
                    </h2>
            @empty
                <h2 class="mb-6 text-sm font-bold">
                    No hay referencias
                </h2>
            @endforelse
        </article>
        </article>
    </div>
</x-app-layout>
