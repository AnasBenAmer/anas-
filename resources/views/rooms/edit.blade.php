<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Room') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 ">
                    <form
                        action="{{ route('room.update', ['complex' => $complex->id, 'building' => $building->id, 'room' => $room->id]) }}"
                        method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="flex flex-col">
                            <div class="mb-4">
                                <label class="font-bold text-gray-800" for="name">number</label>
                                <input
                                    class="border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline"
                                    id="number" name="number" type="text" placeholder=" number">
                            </div>
                            <div class="mb-4">
                                <label class="font-bold text-gray-800" for="floor">floor</label>
                                <input
                                    class="border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline"
                                    id="floor" name="floor" type="text" placeholder="floor">
                            </div>


                            <div class="mb-4">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                    type="submit">
                                    Create
                                </button>
                            </div>
                        </div>
                    </form>



                </div>

            </div>

        </div>
    </div>

</x-app-layout>
