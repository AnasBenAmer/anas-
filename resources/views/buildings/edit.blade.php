<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Warehouse') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 ">
                    <form
                        action="{{ route('building.update', ['complex' => $complex->id, 'building' => $building->id]) }}"
                        method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="flex flex-col">
                            <div class="mb-4">
                                <label class="font-bold text-gray-800" for="name">Name</label>
                                <input
                                    class="border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline"
                                    id="name" name="name" type="text" placeholder=" Name">
                            </div>
                            <div class="mb-4">
                                <label class="font-bold text-gray-800" for="address">floors</label>
                                <input
                                    class="border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline"
                                    id="floors" name="floors" type="text" placeholder="building floors">
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
