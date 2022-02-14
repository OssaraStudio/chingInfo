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
        <header class="is-transparent is-dark border-b backdrop-filter backdrop-blur-2xl" uk-sticky="cls-inactive: is-dark is-transparent border-b"> 
            <div class="header_inner">
                <div class="left-side">
    
                    <!-- Logo -->
                    <div id="logo">
                        <a href=" {{ route('accueil') }} ">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="">
                            <img src="{{ asset('assets/images/logo-light.png') }}" class="logo_inverse" alt="">
                            <img src="{{ asset('assets/images/logo-mobile.png') }}" class="logo_mobile" alt="">
                        </a>
                    </div>
    
                    <!-- icon menu for mobile -->
                    <div class="triger" uk-toggle="target: #wrapper ; cls: is-active">
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
                                                <a href="${window.location.origin}/exercice/${element.slug}">  
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

                    <div>

                       
        
                         <!-- profile -->
                        <a href="#">
                            <img src="{{ asset('assets/images/avatars/placeholder.png') }}" class="header_widgets_avatar" alt="">
                        </a>
                        <div uk-drop="mode: click;offset:5" class="header_dropdown profile_dropdown">
                            <ul>   
                                <li>
                                    <a href="#" class="user">
                                        <div class="user_avatar">
                                            <img src="{{ asset('assets/images/avatars/avatar-2.jpg') }}" alt="">
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
                                        <ion-icon name="rocket-outline" class="is-icon"></ion-icon> <span>  Upgrade Membership  </span>
                                    </a>
                                </li> 
                                <li> 
                                    <hr>
                                </li>
                                <li> 
                                    <a href="#">
                                        <ion-icon name="person-circle-outline" class="is-icon"></ion-icon>
                                         My Account 
                                    </a>
                                </li>
                                <li> 
                                    <a href="#">
                                        <ion-icon name="card-outline" class="is-icon"></ion-icon>
                                        Subscriptions
                                    </a>
                                </li>
                                <li> 
                                    <a href="#">
                                        <ion-icon name="color-wand-outline" class="is-icon"></ion-icon>
                                        My Billing 
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <ion-icon name="settings-outline" class="is-icon"></ion-icon>
                                        Account Settings  
                                    </a>
                                </li>
                                <li> 
                                    <hr>
                                </li>
                                <li> 
                                    <a href="#" id="night-mode" class="btn-night-mode" onclick="UIkit.notification({ message: 'Hmm...  <strong> Night mode </strong> feature is not available yet. ' , pos: 'bottom-right'  })">
                                        <ion-icon name="moon-outline" class="is-icon"></ion-icon>
                                         Night mode
                                        <span class="btn-night-mode-switch">
                                            <span class="uk-switch-button"></span>
                                        </span>
                                    </a>
                                </li>
                                <li> 
                                    <a href="#">
                                        <ion-icon name="log-out-outline" class="is-icon"></ion-icon>
                                        Log Out 
                                    </a>
                                </li>
                            </ul>
                        </div> 

                    </div>
    
                </div>
            </div>
        </header>

        <!-- Main Contents -->
        <div class="main_content">

            <!-- Slideshow -->
            <div class="uk-position-relative uk-visible-toggle overflow-hidden lg:-mt-20" tabindex="-1"
              uk-slideshow="animation: scale ;min-height: 200; max-height: 450 ;autoplay: t rue">

              <ul class="uk-slideshow-items rounded">
                  <li>
                      <div class="uk-position-cover" uk-slideshow-parallax="scale: 1.2,1.2,1">
                          <img src="{{ asset('assets/images/hero-1.jpg') }}" class="object-cover" alt="" uk-cover>
                      </div>
                      <div class="container relative md:p-20 md:mt-7 p-5 h-full"> 
                        <div uk-slideshow-parallax="scale: 1,1,0.8" class="flex flex-col justify-center h-full w-full space-y-3">
                            <h1 uk-slideshow-parallax="y: 100,0,0" class="lg:text-4xl text-2xl text-white font-semibold"> Apprenez du meilleur !!!</h1>
                            <p uk-slideshow-parallax="y: 150,0,0" class="text-base text-white font-medium pb-4 lg:w-1/2"> Choisissez parmi {{ $count }} exercices et leurs solutions, avec de nouveaux ajouts publiés chaque mois. </p>
                            <a uk-slideshow-parallax="y: 200,0,50" href=" {{ route('exercice.all') }} " class="bg-opacity-90 bg-white py-2.5 rounded-md text-base text-center w-64"> Tous les exercices </a> 
                        </div>
                      </div>
                  </li> 
                  <li>
                    <div class="uk-position-cover" uk-slideshow-parallax="scale: 1.2,1.2,1">
                        <img src="{{ asset('assets/images/hero-2.jpg') }}" class="object-cover" alt="" uk-cover>
                    </div>
                    <div class="container relative md:p-20 md:mt-7 p-5 h-full"> 
                        <div uk-slideshow-parallax="scale: 1,1,0.8" class="flex flex-col justify-center h-full w-full space-y-3">
                            <h1 uk-slideshow-parallax="y: 100,0,0" class="lg:text-4xl text-2xl text-white font-semibold"> Apprenez du meilleur !!!</h1>
                            <p uk-slideshow-parallax="y: 150,0,0" class="text-base text-white font-medium pb-4 lg:w-1/2"> Choisissez parmi {{ $count }} exercices et leurs solutions, avec de nouveaux ajouts publiés chaque mois. </p>
                            <a uk-slideshow-parallax="y: 200,0,0" href=" {{ route('exercice.all') }} " class="bg-opacity-90 bg-white py-2.5 rounded-md text-base text-center w-64"> Tous les exercices </a> 
                        </div>
                      </div>
                </li> 
              </ul>

              <ul class="uk-slideshow-nav uk-dotnav absolute bottom-0 left-0 m-7 lg:flex hidden"></ul>
            </div> 
            
            <div class="container">

                <!--  slider courses --> 
                <div class="sm:my-4 my-3 flex items-end justify-between pt-3">
                      <h2 class="text-2xl font-semibold"> Nos Exercices  </h2>
                  <a href=" {{ route('exercice.all') }} " class="text-blue-500 sm:block hidden"> Voir tous nos exercices </a>
                </div> 

                <div class="mt-3">

                    <!--  slider -->
                    <div class="mt-3">
                        <div class="relative" uk-slider="finite: true">

                            <div class="uk-slider-container px-1 py-3">

                                <ul class="uk-slider-items uk-child-width-1-3@m uk-child-width-1-2@s uk-grid-small uk-grid">

                                    @foreach ($modules as $module)
                                        <li>

                                            <a href=" {{ route('module', ['slug' => $module->slug ])}} " class="uk-link-reset">
                                                <div class="card uk-transition-toggle">
                                                    <div class="card-media h-40">
                                                        <div class="card-media-overly"></div>
                                                        <img src="{{ asset('storage/'. $module->image) }}" alt="" class="">
                                                        <span class="icon-play"></span>
                                                    </div>
                                                    <div class="card-body p-4">
                                                        <div class="font-semibold line-clamp-2"> Exercices : {{ $module->title }} </div>
                                                        <div class="flex space-x-2 items-center text-sm pt-3">
                                                            <div> {{ $module->exercises->count() }}  {{ Str::plural('exercice', $module->exercises->count())}} </div>
                                                            <div> & </div>
                                                            <div> {{ Str::plural('solution', $module->exercises->count())}} </div>
                                                        </div>
                                                        {{-- <div class="pt-1 flex items-center justify-between">
                                                            <div class="text-sm font-medium"> John Michael </div>
                                                            <div class="text-lg font-semibold"> $14.99 </div>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </a>

                                        </li>
                                    @endforeach


                                </ul>

                                
                            <a class="absolute bg-white top-16 flex items-center justify-center p-2 -left-4 rounded-full shadow-md text-xl w-9 z-10 dark:bg-gray-800 dark:text-white" href="#" uk-slider-item="previous">  <ion-icon name="chevron-back-outline"></ion-icon> </a>
                            <a class="absolute bg-white top-16 flex items-center justify-center p-2 -right-4 rounded-full shadow-md text-xl w-9 z-10 dark:bg-gray-800 dark:text-white" href="#" uk-slider-item="next"> <ion-icon name="chevron-forward-outline"></ion-icon></a>
                            </div>
                        </div>

                    </div>
                
                </div>
               

            </div>
            
            <!-- footer -->
            <div class="lg:mt-28 mt-10 mb-7 px-12 border-t pt-7">
                <div class="flex flex-col items-center justify-between lg:flex-row max-w-6xl mx-auto lg:space-y-0 space-y-3">
                    <p class="capitalize font-medium"> © copyright <script>document.write(new Date().getFullYear())</script>  Courseplus</p>
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
