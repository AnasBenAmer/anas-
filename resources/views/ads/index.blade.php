<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adverstment') }}
        </h2>
    </x-slot>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                    <div class=" flex justify-center  mb-16">
                        <div class="h-10 w-72 min-w-[200px]">
                            <form action="{{ route('ads.search') }}" method="post">
                                @csrf
                                <input
                                    class="   h-full w-full    px-3 py-3 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200    "
                                    placeholder=" ابحث باستخدم اسم المجمع السكني او مكانه  " id="search"
                                    onkeyup="filter()" style="border: 1px solid grey;" name="ad" required />



                        </div>
                        <div>

                            <button type="submit"
                                class="  h-[43px] bg-sky-500 hover:bg-blue-700 text-white font-bold py-2 px-4 cursor-pointer "
                                style="border: 1px solid grey;"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                        </form>
                    </div>

                    <div class="mb-6"><a href="{{ route('ads.create') }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ">Create</a>
                    </div>
                    <table class="table-auto w-full " id="table">
                        <thead
                            class="text-center border-solid  border border-b-2 border-x	 border-b-black  font-sans	 ">
                            <tr>
                                <th class="px-4 py-2">Title Ad</th>

                                <th class="px-4 py-2 border-x font-bold">created_at</th>
                                <th class="px-4 py-2  border-x font-bold">for_building</th>
                                <th class="px-4 py-2 border-x font-bold">description Ad</th>

                                <th class="px-4 py-2  border-x font-black">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Ads as $ad)
                                @if ($loop->iteration % 2 != 0)
                                    <tr class="text-center">
                                        <td class="border px-4 py-2">{{ $ad->title }}</td>

                                        <td class="border px-4 py-2">{{ $ad->created_at }}</td>
                                        <td class="border px-4 py-2">{{ $ad->building_ad }}</td>
                                        <td class="border px-4 py-2">{{ $ad->description }} </td>
                                        <td class="border py-2 flex items-center justify-center ">
                                            <div>
                                                <a href=""
                                                    class="bg-green-500	 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                                    <i class="fa-solid fa-eye"></i></a>
                                            </div>



                                            <div class="px-4 py-2 ">
                                                <a href="{{ route('ads.edit', $ad->id) }}"
                                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><i
                                                        class="fa-solid fa-pen-to-square"></i></a>
                                            </div>



                                            <!--       <a onclick="confirmation(event)" href="{{ route('ads.destroy', $ad->id) }}"
                                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded .show-alert-delete-box"
                                                title='Delete'data-toggle="tooltip"><i
                                                    class="fa-sharp fa-solid fa-trash"></i></a>

                                        </div>
                                    </td>-->
                                            <div class="">
                                                <form action="{{ route('ads.destroy', $ad->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="confirmDelete(event);"
                                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"><i
                                                            class="fa-sharp fa-solid fa-trash"></i></button>
                                                </form>
                                            </div>
                                    </tr>
                                @else
                                    <tr class="text-center">
                                        <td class="border px-4 py-2 bg-gray-100">{{ $ad->title }}</td>

                                        <td class="border px-4 py-2 bg-gray-100 ">{{ $ad->created_at }}</td>
                                        <td class="border px-4 py-2 bg-gray-100">{{ $ad->building_ad }}</td>
                                        <td class="border px-4 py-2 bg-gray-100">{{ $ad->description }} </td>
                                        <td class="border py-2 flex items-center justify-center bg-gray-100 ">
                                            <div>
                                                <a href=""
                                                    class="bg-green-500	 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                                    <i class="fa-solid fa-eye"></i></a>
                                            </div>



                                            <div class="px-4 py-2 ">
                                                <a href="{{ route('ads.edit', $ad->id) }}"
                                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><i
                                                        class="fa-solid fa-pen-to-square"></i></a>
                                            </div>



                                            <!--       <a onclick="confirmation(event)" href="{{ route('ads.destroy', $ad->id) }}"
                                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded .show-alert-delete-box"
                                                title='Delete'data-toggle="tooltip"><i
                                                    class="fa-sharp fa-solid fa-trash"></i></a>

                                        </div>
                                    </td>-->
                                            <div class="">
                                                <form action="{{ route('ads.destroy', $ad->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="confirmDelete(event);"
                                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"><i
                                                            class="fa-sharp fa-solid fa-trash"></i></button>
                                                </form>
                                            </div>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>

                    {{ $Ads->links() }}

                </div>



                @if (Session::has('success'))
                    <script>
                        swal("Here's the title!", "...and here's the text!");
                    </script>
                @endif


            </div>

        </div>
    </div>


</x-app-layout>
