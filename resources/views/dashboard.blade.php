<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Abertura de porta') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-danger-button-link type="button" class="mb-4" href="{{route('alarme.send')}}">ALARME</x-danger-button-link>
            <x-danger-button-link type="button" class="mb-4" href="{{route('alarme.stop')}}">STOP</x-danger-button-link>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="w-full whitespace-no-wrapw-full whitespace-no-wrap">
                        <thead>
                        <tr class="text-center font-bold">
                            <td class="border px-6 py-4">#</td>
                            <td class="border px-6 py-4">Agency</td>
                            <td class="border px-6 py-4">Data</td>
                            <td class="border px-6 py-4">Status</td>
                        </tr>
                        </thead>
                         @foreach($open_door as $door)
                            <tr>
                                <td class="border px-6 py-4">{{ $door->id }}</td>
                                <td class="border px-6 py-4">{{ $door->agency->name }}</td>
                                <td class="border px-6 py-4">{{ $door->date }}</td>
                                <td class="border px-6 py-4">{{ $door->status }}</td>
                            </tr>
                         @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
