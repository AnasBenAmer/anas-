<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center">
                    {{ __(' ') }}

                    <div>
                        <p class=" font-serif  text-2xl italic font-bold text-black"> create A new Adverstiments </p>
                    </div>

                    <div class=" mt-3  ">
                        <x-input-label for="email" :value="__('Choose the building')"
                            class="  !font-serif !text-black !text-lg !mb-2 !inline mr-2 !max-w-xs ]" />
                        <form action="" action="post">
                            @csrf
                            <select id="email" class="!inline mt-1 w-1/4  rounded-md  " name="reporttype"
                                :value="" required autofocus autocomplete="username">
                                @foreach ($complexs as $complex)
                                    <optgroup label="{{ $complex->name }}" name={{ }}> </optgroup>
                                    @foreach ($complex->buildings as $building)
                                        <option value="{{ $building->name }}" selected>
                                            {{ $building->name }} </option>
                                    @endforeach
                                @endforeach
                            </select>

                    </div>

                    <div class="  ">
                        <div class="">
                            <div class="my-6">
                                <x-input-label for="email" :value="__('Choose the reporttype ')"
                                    class="  !font-serif !text-black !text-lg !mb-2 !inline mr-2 " />
                                <div><select id="email" class="!inline mt-1 w-1/4  rounded-md   " name="report-type"
                                        :value="" required>
                                </div>

                                <option value="اعلان تنسيب "> اعلان تنسيب </option>
                                <option value=" report "> report </option>
                                <option vlaue="manitance report"> manitance report </option>
                            </div>
                            </select>
                        </div>
                    </div>

                    <div class=" ">


                        <div class="mb-2">
                            <x-input-label for="title" :value="__('Enter the title of the alert  ')"
                                class="  !font-serif !text-black !text-lg !mb-2 !inline mr-2 !max-w-xs " />
                        </div>



                        <div>
                            <textarea id="title" name="title" cols="12"class="w-1/2 rounded-md	" rows="10"
                                placeholder="enter the title of the alert" required>
               </textarea>
                            <div class="pt-2">
                                <x-primary-button class="!px-5 !font-medium !font-sans	!text-lg	">
                                    {{ __('Send') }}
                                </x-primary-button>
                            </div>
                        </div>
                        </form>



                        </form>
                    </div>
                </div>




            </div>
        </div>
    </div>
</x-app-layout>
