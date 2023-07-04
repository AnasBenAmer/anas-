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
                                <div class="text-2xl font-bold">{{ $request->title }}</div>
                                <div class="text-sm">{{ $request->content }}</div>
                                <div class="text-sm">{{ $student->name }}</div>
                                <div class="text-sm">{{ $student->phone_number }}</div>




                            </div>
                        </div>
                        <div>
                            <a href="{{ route('Request.index') }}"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Back</a>
                        </div>





                    </div>


                </div>
            </div>

        </div>
    </div>

</x-app-layout>
