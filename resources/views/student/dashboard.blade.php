<x-student-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student Dashboard') }} {{ Auth::guard('student')->User()->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    <div class="font-medium text-base text-black">Name: {{ Auth::guard('student')->user()->id }}
                    </div>
                    <div class="font-medium text-sm text-black"> Email: {{ Auth::guard('student')->user()->email }}
                    </div>
                    <div class="font-medium text-sm text-black"> Email:
                        {{ Auth::guard('student')->user()->building_id }}
                    </div>
                    <div class="font-medium text-sm text-black"> Email:
                        {{ Auth::guard('student')->user()->phone_number }}
                    </div>
                    <div class="font-medium text-sm text-black"> Room Number:
                        {{ Auth::guard('student')->user()->room_number }}
                    </div>
                    <div class="font-medium text-sm text-black"> Email:
                        {{ Auth::guard('student')->user()->room_number }}
                    </div>
                    @foreach ($stunotifications as $stunotification)
                        <div class="font-medium text-sm text-black"> Email:
                            {{ $stunotification->data['student_name'] }}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


</x-student-layout>
