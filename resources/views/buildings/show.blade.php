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
                                <div class="text-2xl font-bold">{{ $building->name }}</div>
                                <div class="text-sm">{{ $building->complex_id }}</div>
                                <div class="text-sm">{{ $building->floors }}</div>

                            </div>
                        </div>
                        <div>
                            <a href="{{ route('complex.show', $complex->id) }}"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Back</a>
                        </div>




                    </div>
                    <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 text-gray-900 ">
                                    <a href="{{ route('room.create', ['complex' => $complex->id, 'building' => $building->id]) }}"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create</a>
                                    <table class="table-auto w-full">
                                        <thead>
                                            <tr>
                                                <th class="px-4 py-2">number</th>
                                                <th class="px-4 py-2">floor</th>
                                                <th class="px-4 py-2">building_id</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($rooms as $room)
                                                <tr>
                                                    <td class="border px-4 py-2 text-center">{{ $room->number }}</td>
                                                    <td class="border px-4 py-2 text-center">{{ $room->floor }}
                                                    </td>
                                                    <td class="border px-4 py-2 text-center">{{ $room->building_id }}
                                                    </td>
                                                    <td class="border py-2 flex items-center justify-center w-[250px]">
                                                        <div>
                                                            <a href="{{ route('room.show', ['complex' => $complex->id, 'building' => $building->id, 'room' => $room->id]) }}"
                                                                class="bg-green-500	 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                                                <i class="fa-solid fa-eye"></i></a>
                                                        </div>



                                                        <div class="px-4 py-2 ">
                                                            <a href="{{ route('room.edit', ['complex' => $complex->id, 'building' => $building->id, 'room' => $room->id]) }}"
                                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><i
                                                                    class="fa-solid fa-pen-to-square"></i> </a>
                                                        </div>
                                                        <div>
                                                            <form method="POST"
                                                                action="{{ route('room.destroy', ['complex' => $complex->id, 'building' => $building->id, 'room' => $room->id]) }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                                                    onclick="confirmDelete(event);"><i
                                                                        class="fa-sharp fa-solid fa-trash"></i>
                                                                </button>
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
