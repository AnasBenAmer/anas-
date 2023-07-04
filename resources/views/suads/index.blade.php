<x-student-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adverstment') }}
        </h2>
    </x-slot>
    <script src="https://kit.fontawesome.com/c100dce926.js" crossorigin="anonymous"></script>
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <title>Close</title>
                    <path
                        d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                </svg>
            </span>
        </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 ">
                    <div class="mb-6"><a href="{{ route('ads.create') }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ">Create</a>
                    </div>
                    <table class="table-auto w-full ">
                        <thead
                            class="text-center border-solid  border border-b-2 border-x	 border-b-black  font-sans	 ">
                            <tr>
                                <th class="px-4 py-2">Title Ad</th>

                                <th class="px-4 py-2 border-x font-bold">created_at</th>

                                <th class="px-4 py-2 border-x font-bold">description Ad</th>

                                <th class="px-4 py-2  border-x font-black">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stuads as $stuad)
                                <tr class="text-center">
                                    <td class="border px-4 py-2">{{ $stuad->title }}</td>

                                    <td class="border px-4 py-2">{{ $stuad->created_at }}</td>

                                    <td class="border px-4 py-2">{{ $stuad->description }} </td>
                                    <td class="border py-2 flex items-center justify-center ">
                                        <div>
                                            <a href=""
                                                class="bg-green-500	 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                                <i class="fa-solid fa-eye"></i></a>
                                        </div>





                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $stuads->links() }}
                </div>

            </div>

        </div>
    </div>

</x-student-layout>
