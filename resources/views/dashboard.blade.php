<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <input type=" hidden" id="cities" value="">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    </x-slot>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        let cityiescount = <?php echo json_encode($cityiescount); ?>;
    </script>
    <script>
        let cities = <?php echo json_encode($cities); ?>;
    </script>
    < <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg  ">
                <div class="p-6 text-gray-900">

                    <div class="   flex   justify-around  items-center  pb-6  mt-7   ">
                        <div class="  bg-[#F3F4F6] flex w-[235px]  rounded-md  justify-start  items-center pb-6 pt-4 ">
                            <div> <i
                                    class="fa-solid fa-users  ml-7 text-base w-[40px] h-[40px]  rounded-full	text-white bg-[#7B74EC] flex items-center justify-center mr-[15px]"></i>
                            </div>
                            <div>
                                <h2 class=" font-bold	font-sans	text-xl	"> {{ $totalcomplexes }} </h2>
                                <span class=" text-sm	text-[#868999]"> Total Complexs </span>
                            </div>


                        </div>
                        <div class="bg-[#F3F4F6] flex w-[235px]  rounded-md  justify-start  items-center pb-6 pt-4 ">
                            <div> <i
                                    class="  fa-solid fa-users fa-sharp fa-light fa-buildings ml-7 text-base w-[40px] h-[40px]  rounded-full	text-white bg-[#5C8AF0] flex items-center justify-center mr-[15px]"></i>
                            </div>
                            <div>
                                <h2 class=" font-bold	font-sans	text-xl	"> {{ $totalbuildings }} </h2>
                                <span class=" text-sm	text-[#868999]"> Total Building </span>
                            </div>


                        </div>
                        <div class="bg-[#F3F4F6] flex w-[235px]  rounded-md  justify-start  items-center pb-6 pt-4 ">
                            <div> <i
                                    class="fa-solid fa-users  ml-7 text-base w-[40px] h-[40px]  rounded-full	text-white bg-[#cf3c3cfd] flex items-center justify-center mr-[15px]"></i>
                            </div>
                            <div>
                                <h2 class=" font-bold	font-sans	text-xl	"> {{ $totalrooms }} </h2>
                                <span class=" text-sm	text-[#868999]"> Total Room </span>
                            </div>


                        </div>
                        <div class="bg-[#F3F4F6] flex w-[235px]  rounded-md  justify-start  items-center pb-6 pt-4 ">
                            <div> <i
                                    class="fa-solid fa-users  ml-7 text-base w-[40px] h-[40px]  rounded-full	text-white bg-[#74daec] flex items-center justify-center mr-[15px]"></i>
                            </div>
                            <div>
                                <h2 class=" font-bold	font-sans	text-xl	"> {{ $totalstudents }}</h2>
                                <span class="  text-sm	text-[#868999]"> Total Studentt </span>
                            </div>

                        </div>
                    </div>

                    <div class="flex justify-start items-center  mt-5">

                        <canvas id="myChart" style="width:100%;max-width:600px"></canvas>

                        <script>
                            console.log(cityiescount);
                            const xValues = cities;

                            const yValues = cityiescount;
                            const barColors = ["red", "green", "blue", "orange", ];

                            new Chart("myChart", {
                                type: "bar",
                                data: {
                                    labels: xValues,
                                    datasets: [{
                                        backgroundColor: barColors,
                                        data: yValues
                                    }]
                                },
                                options: {
                                    legend: {
                                        display: false
                                    },
                                    title: {
                                        display: true,
                                        text: "World Wine Production 2018"
                                    }
                                }
                            });
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
