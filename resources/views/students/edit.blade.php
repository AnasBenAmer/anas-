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
                        action="{{ route('student.update', ['complex' => $complex->id, 'building' => $building->id, 'room' => $room->id, 'student' => $student->id]) }}"
                        method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="flex flex-col">
                            <div class="mb-4">
                                <label class="font-bold text-gray-800" for="name">name</label>
                                <input
                                    class="border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline"
                                    id="name" name="name" type="text" placeholder=" name">
                            </div>
                            <div class="mb-4">
                                <label class="font-bold text-gray-800" for="id_number">id_number</label>
                                <input
                                    class="border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline"
                                    id="id_number" name="id_number" type="text" placeholder="id_number">
                            </div>
                            <div class="mb-4">
                                <label class="font-bold text-gray-800" for="national_number">national_number</label>
                                <input
                                    class="border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline"
                                    id="national_number" name="national_number" type="text"
                                    placeholder="national_number">
                            </div>
                            <div class="mb-4">
                                <label class="font-bold text-gray-800" for="phone_number">phone_number</label>
                                <input
                                    class="border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline"
                                    id="phone_number" name="phone_number" type="text" placeholder="phone_number">
                            </div>
                            <div class="mb-4">
                                <label class="font-bold text-gray-800" for="sex">sex</label>
                                <input
                                    class="border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline"
                                    id="sex" name="sex" type="text" placeholder="sex">
                            </div>

                            <div class="mb-4">
                                <label class="font-bold text-gray-800" for="city">city</label>
                                <input
                                    class="border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline"
                                    id="city" name="city" type="text" placeholder="city">
                            </div>
                            <div class="mb-4">
                                <label class="font-bold text-gray-800" for="room_number">room_number</label>
                                <input
                                    class="border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline"
                                    id="room_number" name="room_number" type="text" placeholder="room_number">
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
