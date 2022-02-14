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
                        <input value="" type="text" class="form-control" placeholder=" Recherche rapide ..." autocomplete="off">
                        
                    </div>

                    <div>

                       
        
                         <!-- profile -->
                        <a href="#">
                            <img src="../assets/images/avatars/placeholder.png" class="header_widgets_avatar" alt="">
                        </a>
                        <div uk-drop="mode: click;offset:5" class="header_dropdown profile_dropdown">
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
            <div class="container">
                
                <div class="md:p-7 p-5 bg-white rounded-md shadow lg:mt-10 mt-6">

                    <h3 class="md:text-2xl text-xl mt-4 mb-1 font-bold"> Les exercices de <mark>{{ Str::lower($module->title) }}</mark> </h3>
                    <p class="mb-8"> Faites vos choix !!!</p>
        
                    <div class="grid lg:grid-cols-3 md:grid-cols-2 md:gap-4 gap-2 -m-3">
                        @foreach ($module->exercises as $exercise)
                            <a href=" {{route('exercice', ['slug' => $exercise->slug])}} ">
                                <div class="hover:bg-gray-100 flex items-start px-3 py-2 rounded-lg space-x-3">
                                    @if ($exercise->id%9 == 0)
                                        @php $color = 'blue' @endphp
                                    @elseif($exercise->id%7 == 0)
                                        @php $color = 'purple' @endphp
                                    @elseif($exercise->id%5 == 0)
                                        @php $color = 'yellow' @endphp
                                    @elseif($exercise->id%3 == 0)
                                        @php $color = 'green' @endphp
                                    @elseif($exercise->id%2 == 0)
                                        @php $color = 'pink' @endphp
                                    @else
                                        @php $color = 'red' @endphp
                                    @endif
                                    @if ($exercise->id<10)
                                        @php $x = '5' @endphp
                                    @elseif ($exercise->id>9 and $exercise->id<100)
                                        @php $x = '3.5' @endphp
                                    @else
                                    @php $x = '1' @endphp
                                    @endif
                                    <div class="text-3xl text-white from-{{$color}}-600 to-{{$color}}-400 bg-gradient-to-tl p-2 px-{{$x}} rounded-md">{{ $exercise->id }}</div>
                                    <div>
                                        <h3 class="font-semibold text-lg">{{ $exercise->title }}</h3>
                                        <div class="flex space-x-2 items-center text-sm pt-0.5">
                                            <div> Exercice </div>
                                            <div>N°</div>
                                            <div> {{ $exercise->id }}</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>


                    <div class="flex justify-center mt-9">
                        <a href="#" class="bg-gray-50 border hover:bg-gray-100 px-4 py-1.5 rounded-full text-sm"> More Topics ..</a>
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
                            <a href=" {{ route('module', ['slug' =>$module->slug]) }} ">
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
