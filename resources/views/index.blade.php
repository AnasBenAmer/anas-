<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Document</title>
</head>

<body style=" direction: rtl;">
    <div>
        <div class="sticky top-0 z-10	">
            <header>

                <!-- logo and h1 -->
                <div class="mr-[20px] flex items-end border-b-[1px]  ">
                    <img src="/images/uotlogo.png" alt="logo tripoli universitey" class="w-[100px] h-[85px] mb-[9px]">
                    <h1 class=" text-[#EFAC16] mr-[20px] text-6xl mb-[8px] font-semibold "> جامعة طرابلس </h1>
                    <hr>
                </div>
            </header>
            <!--  header 2  ---->
            <header class="pb-[17px] pt-4 border-b-[1px]">
                <div class=" mr-[200px] mt-[10px]  sticky top-0">
                    <ul class="flex justify-around  ">
                        <li class="ml-3 text-[#000000B3]  text-4xl text-center "> الصفحة الرئسية </li>
                        <li class="ml-3 text-[#000000B3] text-4xl text-center"> المجمعات السكنية </li>
                        <li class="ml-3 text-[#000000B3]  text-4xl text-center"> نظام الاعاشة والواجبات </li>
                        <li class="ml-3 text-[#000000B3]  text-4xl text-center"> شروط التسجيل والاقامة</li>
                        <li class="ml-3 text-[#000000B3]  text-4xl text-center"> الصفحة الرئسية </li>
                        <li class="ml-3 text-[#000000B3]  text-4xl text-center"> الصفحة الرئسية </li>
                    </ul>
                </div>
            </header>
        </div>
        <div class=" w-[100%] h-[30%] ">

            <div id="myCarousel" class="carousel slide " data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner ">
                    <div class="item active">
                        <img src="/images/uotlogo.png" alt="Los Angeles" style="  " class="w-[100%] h-[600px]">
                    </div>

                    <div class="item w-[100%]">
                        <img src="/images/uotlogo.png" alt="Chicago" style="width:100%;  height:30%;">
                    </div>

                    <div class="item">
                        <img src="/images/uotlogo.png" alt="New york" style="width:100%;  height:30%;">
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

    </div>
    <div class="pt-9 pb-16">
        <h2 class="text-center  text-7xl"> المجمعات السكنية الطلابية</h2>
    </div>
    <!--                             المجمع السكني الفرناج    -->
    <div class="flex items-center justify-center  ">
        <div class="card border-2 ml-48	" style="width: 40rem;">
            <div class="flex justify-center "> <img class=" " src="/images/uotlogo.png" alt="Card image cap"></div>
            <div class="card-body">
                <h5 class="card-title text-center text-5xl   my-4 font-serif font-black leading-[50px]"> المبيت
                    الاسكاني
                    الفرناج </h5>
                <p class=" text-4xl text-center  leading-relaxed"> يقع المجمع السكني الفرناج التابع لي جامعة طرابلس
                    بالقرب من
                    جزيرة
                    الفرناج باتجاه
                    طريق عودة حياة ويحتوي على عدد 3 عمارات اسكانية طلابية
                    .</p>

            </div>
        </div>
        <!--  المجمع السكني الهضبة الشرقية -->
        <div class="card border-2	" style="width: 40rem;">
            <div class="flex justify-center "> <img class=" " src="/images/uotlogo.png" alt="Card image cap"></div>
            <div class="card-body">
                <h5 class="card-title text-center text-5xl   my-4 font-serif font-black leading-[50px]"> المبيت الاسكاني
                    الفرناج </h5>
                <p class=" text-4xl text-center leading-relaxed	 "> يقع المجمع السكني الهضبة التابع لي جامعة طرابلس
                    بالقرب
                    من
                    جزيرة
                    الفرناج باتجاه
                    طريق عودة حياة ويحتوي على عدد 3 عمارات اسكانية طلابية
                    .</p>

            </div>
        </div>
    </div>

    </div>

</body>

</html>
