<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Warehouse') }}
        </h2>
    </x-slot>
    <script src="https://kit.fontawesome.com/c100dce926.js" crossorigin="anonymous"></script>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 ">
                    <div class="flex justify-between">
                        <div class="flex">
                            <div class="flex flex-col">
                                <div class="text-2xl font-bold">{{ $complex->name }}</div>
                                <div class="text-sm">{{ $complex->address }}</div>

                            </div>
                        </div>
                        <div>
                            <a href="{{ route('complex.index') }}"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Back</a>
                        </div>




                    </div>
                    <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 text-gray-900 ">
                                    <a href="{{ route('building.create', $complex->id) }}"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create</a>
                                    <table class="table-auto w-full">
                                        <thead>
                                            <tr>
                                                <th class="px-4 py-2">Name</th>
                                                <th class="px-4 py-2">floors</th>
                                                <th class="px-4 py-2">complex_id</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($buildings as $building)
                                                <tr>
                                                    <td class="border px-4 py-2 text-center">{{ $building->name }}</td>
                                                    <td class="border px-4 py-2 text-center">{{ $building->floors }}
                                                    </td>
                                                    <td class="border px-4 py-2 text-center">{{ $building->complex_id }}
                                                    </td>
                                                    <td class="border py-2 flex items-center justify-center w-[250px]">
                                                        <div>
                                                            <a href="{{ route('building.show', ['complex' => $complex->id, 'building' => $building->id]) }}"
                                                                class="bg-green-500	 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                                                <i class="fa-solid fa-eye"></i></a>
                                                        </div>



                                                        <div class="px-4 py-2 ">
                                                            <a href="{{ route('building.edit', ['complex' => $complex->id, 'building' => $building->id]) }}"
                                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><i
                                                                    class="fa-solid fa-pen-to-square"></i></a>
                                                        </div>
                                                        <div>
                                                            <form method="POST"
                                                                action="{{ route('building.destroy', ['complex' => $complex->id, 'building' => $building->id]) }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"><i
                                                                        class="fa-sharp fa-solid fa-trash"
                                                                        onclick="confirmDelete(event);"></i></button>
                                                            </form>
                                                        </div>
                                            @endforeach
                                        </tbody>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

</x-app-layout>
