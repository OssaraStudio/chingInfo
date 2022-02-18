<!DOCTYPE html>
<html lang="fr">

<head> 

    <!-- Basic Page Needs
    ================================================== -->
    <title>chingInfo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="chingInfo est une plateforme des exercices de module informatique">

    <!-- Favicon -->
    <link href="{{ asset('assets/images/favicon.png') }}" rel="icon" type="image/png">

    <!-- icons
    ================================================== -->
    <link rel="stylesheet" href="{{ asset('assets/css/icons.css') }}">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{ asset('assets/css/uikit.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper" class="is-verticle">

        <!--  Header  -->
        <header uk-sticky="" class="uk-sticky uk-sticky-fixed" style="position: fixed; top: 0px; width: 1301px;"> 
            <div class="header_inner">
                <div class="left-side">
    
                    <!-- Logo -->
                    <div id="logo">
                        <a href=" {{ route('accueil') }} ">
                            ching<span class="text-yellow-600 text-xl italic font-bold">Info</span>
                        </a>
                    </div>
    
                    <!-- icon menu for mobile -->
                    <div class="triger" uk-toggle="target: #wrapper ; cls: is-active" tabindex="0" aria-expanded="false">
                    </div>
    
                </div>
                <div class="right-side">
     
                    <!-- Header search box  -->
                    <div class="header_search"><ion-icon name="search" class="icon-search">
                    </ion-icon>
                        <input id="research" type="text" class="form-control" placeholder=" Recherche rapide ..." autocomplete="off">
                        
                        <div uk-drop="mode: click;offset:10" class="header_search_dropdown uk-drop" style="left: 0px; top: 54px;">
                               
                            <h4 class="search_title"> Recherche </h4>
                            <ul id='my_ul'>
                                
                            </ul>
    
                        </div>
                        <script>
                            let my_el = document.getElementById("research");
                            let el = document.getElementById("my_ul");
                            let data = '';
                            my_el.addEventListener('keydown', (e) => {
                                el.innerHTML = '';
                                data = my_el.value;
                                if(e.key.length == 1)
                                    data += e.key;
                                else if(e.key.length > 1)
                                    data = data.substr(0,(data.length -1))
                                
                                if(data.length > 0)
                                {
                                    fetch(`${window.location.origin}/recherche/${data}`)
                                    .then(response => response.json())
                                    .then(response => {
                                        let a = JSON.stringify(response);
                                        
                                        response.forEach(element => {
                                            el.innerHTML += 
                                            `<li> 
                                                <a href="${window.location.origin}/exercice/${element.id}/${element.title}">  
                                                    <div class="text-sm text-white from-red-600 to-red-400 bg-gradient-to-tl p-2 px-5 rounded-full"> ${element.id}  </div>
                                                    <div class="text-sm text-black  p-2 px-5 rounded-md">  ${element.title} </div>
                                                </a> 
                                            </li>`
                                        })
                                    })
                                    .catch(error => alert("Erreur : " + error));
                                }
                            })
                        </script>
                    </div>


    
                </div>
            </div>
        </header>

        <!-- Main Contents -->
        <div class="main_content">
            <div class="container p-0">

                <div class="bg-blue-600 md:rounded-b-lg md:-mt-8 md:pb-8 md:pt-12 p-8 relative overflow-hidden" style="background: #1877f2;">

                    <div class="lg:w-9/12 relative z-10">

                        <div class="uppercase text-gray-200 mb-2 font-semibold text-sm"> {{ $exercises[0]->module->title }} </div>
                        <h1 class="lg:leading-10 lg:text-3xl text-white text-2xl leading-8 font-semibold"> Les Exercices selectionnés </h1>
                        {{-- <p class="lg:text-lg hidden"> Master JavaScript with the most complete course! Projects Excellent course. we explain the core concepts in javascript 
                        that are usually glossed over in other courses </p> --}}
                        {{-- <ul class="flex text-gray-200 gap-4 mt-4 mb-2">
                            <li class="flex items-center">
                                <span class="avg bg-yellow-500 mr-2 px-2 rounded text-white font-semiold"> 4.9 </span>
                                <div class="star-rating text-yellow-400">
                                    <ion-icon name="star" role="img" class="md hydrated" aria-label="star"></ion-icon> <ion-icon name="star" role="img" class="md hydrated" aria-label="star"></ion-icon>
                                    <ion-icon name="star" role="img" class="md hydrated" aria-label="star"></ion-icon> <ion-icon name="star" role="img" class="md hydrated" aria-label="star"></ion-icon>
                                    <ion-icon name="star-half" role="img" class="md hydrated" aria-label="star half"></ion-icon>
                                </div>
                            </li>
                            <li> <ion-icon name="people-circle-outline" role="img" class="md hydrated" aria-label="people circle outline"></ion-icon> 1200 Enerolled </li>
                        </ul>
                        <ul class="lg:flex items-center text-gray-200">
                            <li> Created by <a href="#" class="text-white fond-bold hover:underline hover:text-white"> Stella Johnson </a> </li>
                            <li> <span class="lg:block hidden mx-3 text-2xl">·</span> </li>
                            <li> Last updated 10/2019</li>
                        </ul> --}}

                    </div>

                    <img src="../assets/images/courses/course-intro.png" alt="" class="-bottom-1/2 absolute right-0 hidden lg:block">

                </div>
                 
                <div class="lg:flex lg:space-x-4 mt-4">
                    <div class="space-y-4">
                        
                        <div class="tube-card z-20 mb-4 overflow-hidden uk-sticky" uk-sticky="cls-active:rounded-none ; media: 992 ; offset:70" style="">
                            <nav class="cd-secondary-nav extanded ppercase nav-small">
                                <ul class="space-x-3" uk-scrollspy-nav="closest: li; scroll: true">
                                    <li class="uk-active"><a href="#Overview" uk-scroll="">SUJET</a></li>
                                    <li class=""><a href="#curriculum" uk-scroll="">SOLUTION</a></li> 
                                    <li class=""><a href="#faq" uk-scroll="">PDF</a></li>
                                </ul>
                            </nav>
                        </div><div class="uk-sticky-placeholder" style="height: 59px; margin: 0px 0px 16px;" hidden=""></div>


                        <!-- course description -->
                        <div class="tube-card p-6" id="Overview">
    
                            @foreach ($exercises as $exercise)
                                <h3 class="mb-4 text-xl font-semibold"> Exercise N°{{ $exercise->id }} : {{ $exercise->title }} </h3>
                                <div class="space-y-7">
                                    {!! $exercise->content !!}
                                </div>
                            @endforeach

                        </div>

                        <!-- course Curriculum -->
                        <div id="curriculum">
                            @foreach ($exercises as $exercise)
                                <h3 class="mb-4 text-xl font-semibold"> Solution N°{{ $exercise->id }} : {{ $exercise->title }}</h3>
                                <div class="tube-card p-4 divide-y space-y-3 uk-accordion">
                                   @if ($exercise->solution)
                                    {!! $exercise->solution->content !!}
                                   @else
                                    Solution non disponible
                                   @endif
                                </div>
                            @endforeach
                        </div>

                        <!-- course Faq -->
                        <div id="faq" class="tube-card p-5">
                            <h3 class="text-lg font-semibold mb-3"> Télécharger PDF </h3>
                            @foreach ($links as $link)
                            <div class="flex justify-center mt-9">
                                <a href=" {{$link}} " target="_blank" class="bg-red-600 text-white hover:text-white border px-4 py-1.5 rounded-full text-sm"> Télécharger PDF {{$exercises[$loop->index]->id}}</a>
                            </div>
                            @endforeach
                        </div>


                    </div>
                </div>

            </div>

            <!-- footer -->
            <div class="lg:mt-28 mt-10 mb-7 px-12 border-t pt-7">
                <div class="flex flex-col items-center justify-between lg:flex-row max-w-6xl mx-auto lg:space-y-0 space-y-3">
                    <p class="capitalize font-medium"> © copyright <script>document.write(new Date().getFullYear())</script>  chingInfo</p>
                    <div class="lg:flex space-x-4 text-gray-700 capitalize hidden">
                        <a href=" {{ route('accueil') }} "> Accueil</a>
                        <a href="#"> Aide</a>
                        <a href="#"> Nous contactez</a>
                    </div>
                </div>
            </div>
        </div>
 
        <!-- sidebar -->
        <div class="sidebar">
            <div class="sidebar_inner" data-simplebar>
                
                <ul class="side-colored">
                    @foreach ($modules as $module)
                        <li 
                            @if ($loop->odd)
                                class="active"
                            @endif
                        >
                            <a href=" {{ route('module', ['slug' => $module->slug]) }} ">
                                <ion-icon name="{{ $module->icon }}" class="bg-gradient-to-br from-purple-300 p-1 rounded-md side-icon text-opacity-80 text-white to-blue-500">
                                </ion-icon>
                                <span> {{ $module->title }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>


            </div>

        </div>
        
    </div>


    <!-- Javascript
    ================================================== -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.7.6/dist/js/uikit.min.js"></script>
    <script src="{{ asset('assets/js/uikit.js') }}"></script>
    <script src="{{ asset('assets/js/tippy.all.min.js') }}"></script>
    <script src="{{ asset('assets/js/simplebar.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script>
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>

</body>

</html>