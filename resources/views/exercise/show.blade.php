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
	<script src=" {{ asset('assets/js/jquery.min.js') }} "></script>

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


                    {{-- <div>
        
                         <!-- profile -->
                        <a href="#" aria-expanded="false">
                            <img src=" {{ asset('assets/images/avatars/placeholder.png')}} " class="header_widgets_avatar" alt="">
                        </a>
                        <div uk-drop="mode: click;offset:5" class="header_dropdown profile_dropdown uk-drop">
                            <ul>   
                                <li>
                                    <a href="#" class="user">
                                        <div class="user_avatar">
                                            <img src="../assets/images/avatars/avatar-2.jpg" alt="">
                                        </div>
                                        <div class="user_name">
                                            <div> Stella Johnson </div>
                                            <span> @Johnson </span>
                                        </div>
                                    </a>
                                </li>
                                <li> 
                                    <hr>
                                </li>
                                <li> 
                                    <a href="#" class="is-link">
                                        <ion-icon name="rocket-outline" class="is-icon md hydrated" role="img" aria-label="rocket outline"></ion-icon> <span>  Upgrade Membership  </span>
                                    </a>
                                </li> 
                                <li> 
                                    <hr>
                                </li>
                                <li> 
                                    <a href="#">
                                        <ion-icon name="person-circle-outline" class="is-icon md hydrated" role="img" aria-label="person circle outline"></ion-icon>
                                         My Account 
                                    </a>
                                </li>
                                <li> 
                                    <a href="#">
                                        <ion-icon name="card-outline" class="is-icon md hydrated" role="img" aria-label="card outline"></ion-icon>
                                        Subscriptions
                                    </a>
                                </li>
                                <li> 
                                    <a href="#">
                                        <ion-icon name="color-wand-outline" class="is-icon md hydrated" role="img" aria-label="color wand outline"></ion-icon>
                                        My Billing 
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <ion-icon name="settings-outline" class="is-icon md hydrated" role="img" aria-label="settings outline"></ion-icon>
                                        Account Settings  
                                    </a>
                                </li>
                                <li> 
                                    <hr>
                                </li>
                                <li> 
                                    <a href="#" id="night-mode" class="btn-night-mode" onclick="UIkit.notification({ message: 'Hmm...  <strong> Night mode </strong> feature is not available yet. ' , pos: 'bottom-right'  })">
                                        <ion-icon name="moon-outline" class="is-icon md hydrated" role="img" aria-label="moon outline"></ion-icon>
                                         Night mode
                                        <span class="btn-night-mode-switch">
                                            <span class="uk-switch-button"></span>
                                        </span>
                                    </a>
                                </li>
                                <li> 
                                    <a href="#">
                                        <ion-icon name="log-out-outline" class="is-icon md hydrated" role="img" aria-label="log out outline"></ion-icon>
                                        Log Out 
                                    </a>
                                </li>
                            </ul>
                        </div> 

                    </div> --}}
    
                </div>
            </div>
        </header>

        <!-- Main Contents -->
        <div class="main_content">
            <div class="container p-0">

                <div class="bg-blue-600 md:rounded-b-lg md:-mt-8 md:pb-8 md:pt-12 p-8 relative overflow-hidden" style="background: #1877f2;">

                    <div class="lg:w-9/12 relative z-10">

                        <div class="uppercase text-gray-200 mb-2 font-semibold text-sm"> {{ $exercise->module->title }} </div>
                        <h1 class="lg:leading-10 lg:text-3xl text-white text-2xl leading-8 font-semibold"> Exercice N°{{ $exercise->id }} : {{ $exercise->title }} </h1>
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
                        </div>
                        
                        <!-- course description -->
                        <div class="tube-card p-6" id="Overview">
        
                            <h3 class="mb-4 text-xl font-semibold"> Sujet </h3>
                            <div class="space-y-7">
                                {!! $exercise->content !!}
                            </div>

                        </div>

                    <!-- course Curriculum -->
                        <div id="curriculum">
                            <h3 class="mb-4 text-xl font-semibold"> Solution </h3>
                            <div class="tube-card p-4 divide-y space-y-3 uk-accordion">
                                @if ($exercise->solution)
                                    {!! $exercise->solution->content !!}
                                @else
                                    Solution non disponible
                                @endif                               
                            </div>
                        </div>

                        <!-- course Faq -->
                        <div id="faq" class="tube-card p-5">
                            <h3 class="text-lg font-semibold mb-3"> Télécharger PDF </h3>
                            <div class="flex justify-center mt-9">
                                <a href=" {{$link}} " target="_blank" class="bg-red-600 text-white hover:text-white border px-4 py-1.5 rounded-full text-sm"> Télécharger PDF</a>
                            </div>
                        </div>


                    </div>

                    <!-- course intro Sidebar -->
                    {{-- <div class="lg:w-4/12 space-y-4 lg:mt-0 mt-4">
                        
                        <div uk-sticky="top:600;offset:; offset:90 ; media: 1024" class="uk-sticky" style="">
                            <div class="tube-card p-5 uk-sticky" uk-sticky="top:600;offset:; offset:90 ; media: @s" style=""> 
    
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="flex flex-col space-y-2">
                                        <div class="text-3xl font-semibold"> 3.2 </div>
                                        <div> Hours </div>
                                        <ion-icon name="time" class="text-lg md hydrated" hidden="" role="img" aria-label="time"></ion-icon>
                                    </div>
                                    <div class="flex flex-col space-y-2">
                                        <div class="text-3xl font-semibold"> 12,140</div>
                                        <div> Students </div>
                                        <ion-icon name="people-circle" class="text-lg md hydrated" hidden="" role="img" aria-label="people circle"></ion-icon>
                                    </div>
                                </div>
                                <hr class="-mx-5 border-gray-200 my-4">
                                <h4 hidden=""> COURSE INCLUDES</h4>
    
                                <div class="-m-5 divide-y divide-gray-200 text-sm">
                                    <div class="flex items-center px-5 py-3">  <ion-icon name="play-outline" class="text-2xl mr-2 md hydrated" role="img" aria-label="play outline"></ion-icon> 13 hours on-demand video </div>
                                    <div class="flex items-center px-5 py-3">  <ion-icon name="key-outline" class="text-2xl mr-2 md hydrated" role="img" aria-label="key outline"></ion-icon> Full lifetime access </div>
                                    <div class="flex items-center px-5 py-3">  <ion-icon name="download-outline" class="text-2xl mr-2 md hydrated" role="img" aria-label="download outline"></ion-icon> 42 downloadable resources </div>
                                    <div class="flex items-center px-5 py-3">  <ion-icon name="help-circle-outline" class="text-2xl mr-2 md hydrated" role="img" aria-label="help circle outline"></ion-icon>Assignments </div>
                                    <div class="flex items-center px-5 py-3">  <ion-icon name="medal-outline" class="text-2xl mr-2 md hydrated" role="img" aria-label="medal outline"></ion-icon>Certificate of Completion </div>
                                </div>
                                
                            </div><div class="uk-sticky-placeholder" style="height: 346px; margin: 0px;" hidden=""></div>
                            <div class="mt-4">
                                <a href="course-watch.html" class="flex items-center justify-center h-9 px-6 rounded-md bg-blue-600 text-white"> Enroll Now </a>
                            </div>
                        </div><div class="uk-sticky-placeholder" style="height: 398px; margin: 0px;" hidden=""></div>

                        <div class="tube-card p-5"> 
                            <div class="flex items-start justify-between">
                                <div>
                                    <h4 class="text-lg -mb-0.5 font-semibold"> Related  Courses </h4>
                                </div>
                                <a href="#" class="text-blue-600"> <ion-icon name="refresh" class="-mt-0.5 -mr-2 hover:bg-gray-100 p-1.5 rounded-full text-lg md hydrated" role="img" aria-label="refresh"></ion-icon> </a>
                            </div>
                            <div class="p-1">
                                <a href="#" class="-mx-3 block hover:bg-gray-100 p-2 rounded-md">
                                    <div class="flex items-center space-x-3">
                                        <img src="../assets/images/courses/img-2.jpg" alt="" class="h-12 object-cover rounded-md w-12">
                                        <div class="line-clamp-2 text-sm font-medium">
                                            The Complete JavaScript From beginning to Experts for advance
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="-mx-3 block hover:bg-gray-100 p-2 rounded-md">
                                    <div class="flex items-center space-x-3">
                                        <img src="../assets/images/courses/img-4.jpg" alt="" class="h-12 object-cover rounded-md w-12">
                                        <div class="line-clamp-2 text-sm font-medium"> 
                                            The Complete JavaScript From beginning to Experts for advance
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="-mx-3 block hover:bg-gray-100 p-2 rounded-md">
                                    <div class="flex items-center space-x-3">
                                        <img src="../assets/images/courses/img-3.jpg" alt="" class="h-12 object-cover rounded-md w-12">
                                        <div class="line-clamp-2 text-sm font-medium"> 
                                            The Complete JavaScript From beginning to Experts for advance
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <a href="#" class="hover:bg-gray-100 -mb-1.5 mt-0.5 h-8 flex items-center justify-center rounded-md text-blue-400 text-sm"> 
                                See all 
                            </a>
                        </div>

                    </div> --}}
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
    <script src=" {{ asset('assets/js/jspdf.debug.js') }} "></script>
    <script src=" {{ asset('assets/js/html2canvas.min.js') }}"></script>
    <script src=" {{ asset('assets/js/html2pdf.min.js') }}"></script>


</body>

</html>
