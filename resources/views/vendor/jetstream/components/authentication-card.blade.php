<div class="flex flex-col items-center min-h-screen pt-6 mx-1 my-5 sm:justify-center sm:pt-0 bg-cyan-200">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full max-w-6xl px-6 py-4 mx-auto mt-6 overflow-hidden bg-white shadow-md sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
