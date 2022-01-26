<x-app-layout>
    <div class="flex flex-col w-full h-full mx-auto my-auto lg:items-start max-w-7xl lg:flex-row">
        <section class="flex flex-col w-11/12 min-h-screen p-6 mx-auto my-10 bg-white rounded-lg shadow-xl">
            <h1 class="text-3xl font-bold">
                Créditos
            </h1>
            @forelse ($credits as $credit)
                <article
                    class="flex flex-col items-start justify-start p-6 mt-6 border-4 border-black border-dashed rounded-lg sm:flex-row min-w-90">
                    <img class="object-center w-48 h-48 rounded-full sm:mr-6" src="{{ $credit->picture }}"
                        alt="{{ $credit->name }}" />
                    <div>
                        <h2 class="text-2xl font-bold">
                            {{ $credit->name }}
                        </h2>
                        <h3 class="text-xl font-bold">
                            {{ $credit->role }}
                        </h3>
                        <p class="mt-3">
                            {{ $credit->description }}
                        </p>
                    </div>
                </article>
            @empty
                <article
                    class="flex flex-col items-start justify-start p-6 mt-6 border-4 border-black border-dashed rounded-lg sm:flex-row min-w-90">
                    No hay creditos
                </article>
            @endforelse

        </section>
    </div>
</x-app-layout>
