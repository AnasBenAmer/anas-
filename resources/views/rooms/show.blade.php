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
                                <div class="text-2xl font-bold">{{ $room->number }}</div>
                                <div class="text-sm">{{ $room->building_id }}</div>
                                <div class="text-sm">{{ $room->floor }}</div>

                            </div>
                        </div>
                        <div>
                            <a href="{{ route('building.show', ['complex' => $complex->id, 'building' => $building->id]) }}"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Back</a>
                        </div>





                    </div>
                    <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 text-gray-900 ">
                                    <a href="{{ route('student.create', ['complex' => $complex->id, 'building' => $building->id, 'room' => $room->id]) }}"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create</a>
                                    <table class="table-auto w-full">
                                        <thead>
                                            <tr>
                                                <th class="px-4 py-2">name</th>
                                                <th class="px-4 py-2">id_number</th>
                                                <th class="px-4 py-2">national_number</th>
                                                <th class="px-4 py-2">phone_number</th>
                                                <th class="px-4 py-2">sex</th>
                                                <th class="px-4 py-2">city</th>
                                                <th class="px-4 py-2">room_number</th>

                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($students as $student)
                                                <tr>
                                                    <td class="border px-4 py-2 text-center">{{ $student->name }}</td>

                                                    <td class="border px-4 py-2 text-center">{{ $student->id_number }}
                                                    </td>
                                                    <td class="border px-4 py-2 text-center">
                                                        {{ $student->national_number }}
                                                    </td>
                                                    <td class="border px-4 py-2 text-center">
                                                        {{ $student->phone_number }}
                                                    </td>
                                                    <td class="border px-4 py-2 text-center">
                                                        {{ $student->sex }}
                                                    </td>
                                                    <td class="border px-4 py-2 text-center">
                                                        {{ $student->city }}
                                                    </td>
                                                    <td class="border px-4 py-2 text-center">
                                                        {{ $student->room_number }}
                                                    </td>
                                                    <td class="border py-2 flex items-center justify-center w-[250px]">
                                                        <div>
                                                            <a href="{{ route('student.show', ['complex' => $complex->id, 'building' => $building->id, 'room' => $room->id, 'student' => $student->id]) }}"
                                                                class="bg-green-500	 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                                                <i class="fa-solid fa-eye"></i></a>
                                                        </div>



                                                        <div class="px-4 py-2 ">
                                                            <a href="{{ route('student.edit', ['complex' => $complex->id, 'building' => $building->id, 'room' => $room->id, 'student' => $student->id]) }}"
                                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><i
                                                                    class="fa-solid fa-pen-to-square"></i> </a>
                                                        </div>
                                                        <div>
                                                            <form method="POST"
                                                                action="{{ route('student.destroy', ['complex' => $complex->id, 'building' => $building->id, 'room' => $room->id, 'student' => $student->id]) }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"><i
                                                                        class="fa-sharp fa-solid fa-trash"
                                                                        onclick="confirmDelete(event);"></i>
                                                                </button>
                                                            </form>
                                                        </div>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

</x-app-layout>
