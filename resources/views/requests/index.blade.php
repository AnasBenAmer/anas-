<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Requests') }}
        </h2>
    </x-slot>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
        integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
    </script>
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
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg   ">
                <div class="p-6 text-gray-900 ">

                    <div class=" flex justify-center  mb-16">
                        <div class="h-10 w-72 min-w-[200px]">
                            <form>
                                <input
                                    class="   h-full w-full    px-3 py-3 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200    "
                                    placeholder=" ابحث باستخدم اسم المجمع السكني او مكانه  " id="search"
                                    onkeyup="filter()" style="border: 1px solid grey;" name="" />

                            </form>

                        </div>
                        <button href=""
                            class="  h-[43px] bg-sky-500 hover:bg-blue-700 text-white font-bold py-2 px-4 cursor-pointer "
                            style="border: 1px solid grey;"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>





                    <table class="table-auto w-full " id="table">
                        <thead class="text-center border-solid  border border-b-2  border-b-black  font-sans	 ">
                            <tr>
                                <th class="px-4  py-2 border-x font-bold">complex_name</th>

                                <th class="px-4 py-2 border-x font-bold">building_name</th>
                                <th class="px-4 py-2 border-x font-bold">student_name</th>
                                <th class="px-4 py-2 border-x font-bold">student_number</th>
                                <th class="px-4 py-2 border-x font-bold">Time</th>

                                <th class="px-4 py-2 border-x font-bold">Title</th>

                                <th class="px-4 py-2 border-x font-bold">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($requests as $request)
                                <tr>




                                    <td class="border px-4 py-1 text-center">{{ $request->complex_name }}</td>
                                    <td class="border px-4 py-1 text-center"><a>{{ $request->building_name }}</a>
                                    </td>
                                    <td class="border px-4 py-1 text-center">{{ $request->student_name }}</td>

                                    <td class="border px-4 py-1 text-center">{{ $request->student_number }}</td>
                                    <td class="border px-4 py-1 text-center">{{ $request->created_at }}</td>
                                    <td class="border px-4 py-1 text-center">{{ $request->title }}</td>


                                    <!--     < class="border px-4 py-2"> -->
                                    <td class="flex items-center border  py-1  px-4 justify-center  ">
                                        <div>
                                            <a href="{{ route('Request.show', $request->id) }}"
                                                class="bg-green-500	 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                                <i class="fa-solid fa-eye"></i></a>
                                        </div>
                                        <div>
                                            <form action="{{ route('Request.destroy', $request->id) }}" method="POST"
                                                class="px-4 py-2">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"><i
                                                        class="fa-sharp fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                        <!-- <td class="border px-4 py-2"> -->

                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>





                </div>

            </div>

        </div>
    </div>

</x-app-layout>
