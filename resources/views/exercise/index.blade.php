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
                            ching<span class="text-yellow-600 text-xl italic font-bold">Info</span>
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

                    </div> --}}
    
                </div>
            </div>
        </header>

        <!-- Main Contents -->
        <div class="main_content">
            <div class="container">
                
                <form action="{{ route('select') }}" method="post">
                    @csrf
                <div class="md:p-7 p-5 bg-white rounded-md shadow lg:mt-10 mt-6">

                    <h3 class="md:text-2xl text-xl mt-4 mb-1 font-bold"> Les exercices de <mark>{{ Str::lower($module->title) }}</mark> </h3>
                    <p class="mb-8"> Faites vos choix !!!</p>
        
                    <div class="grid lg:grid-cols-3 md:grid-cols-2 md:gap-4 gap-2 -m-3">
                        @foreach ($module->exercises as $exercise)
                        @if ($exercise->online === 1)
                            <a href=" {{route('exercice', ['id' => $exercise->id, 'slug' => $exercise->slug])}} ">
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
                                    <input type="checkbox" name="id[]" value="{{ $exercise->id }}" class="w-8">
                                </div>
                            </a>
                        @endif
                        @endforeach
                    </div>


                    <div class="flex justify-center mt-9">
                        <script>
                            el = document.querySelectorAll("input[type=checkbox]");
                            console.log(el);
                            el.forEach(e => {
                               e.addEventListener('change', x => {
                                   if(x.target.checked){
                                       document.querySelector("button[type=submit]").removeAttribute('disabled');
                                   } else {
                                       document.querySelector("button[type=submit]").setAttribute("disabled", true);
                                   }
                               })
                            })
                        </script>
                        <button type="submit" disabled class="bg-gray-50 border hover:bg-gray-100 px-4 py-1.5 rounded-full text-sm"
                        > Voir les exercices sélectionnés</button>
                    </div>
                </form>

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
