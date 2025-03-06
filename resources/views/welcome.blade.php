<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rica Informática</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <link rel="icon" href="{{ asset('img/logo.jpeg') }}">

    <style>
        * {
            font-family: "Poppins", serif;
            letter-spacing: 3px;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
    <header id="navbar" class="w-full container text-sm mb-6 not-has-[nav]:hidden sticky top-1 z-50">
        @if (Route::has('login'))
            <nav class="flex items-center justify-between gap-4">
                <div class="flex items-center">
                    <a href="/" class="inline-block py-1.5 gap-2">
                        <img class="size-10" src="{{ asset('img/logorica.png') }}" alt="logo rica informática">
                    </a>

                    <div class="hidden lg:block">
                        <a href=""
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">
                            Inicio
                        </a>

                        <a href=""
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">
                            Funcionalidades
                        </a>

                        <a href=""
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">
                            Sobre nós
                        </a>
                    </div>
                </div>

                <div>
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                            Painel Rica
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">
                            Entrar
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                Registre-se
                            </a>
                        @endif
                    @endauth
                </div>
            </nav>
        @endif
    </header>

    <div id="content" class="container flex w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0 mt-12">
        <main class="flex justify-between items-center md:px-5 w-full flex-col-reverse lg:flex-row">
            <div class="space-y-7 lg:max-w-4xl">
                <span class="text-blue-500 font-medium pl-2">Rica Informática</span>
                <h1 class="text-4xl leading-none md:text-4xl xl:text-5xl dark:text-white">
                    Simplifique a gestão do seu negócio
                </h1>

                <p class="max-w-2xl text-sm lg:text-md">
                    Adote uma poderosa ferramenta tecnológica e descubra novas oportunidades de gerenciar seu negócio e
                    aumentar suas vendas.
                </p>

                <div class="">
                    <a href="{{ route('register') }}"
                        class="inline-block px-5 py-1.5 text-[#1b1b18] hover:text-blue-600 border-[#19140035] hover:border-blue-500 border rounded-sm text-sm leading-normal cursor-pointer">
                        Falar conosco
                    </a>

                    <a
                        class="inline-block px-5 py-1.5 hover:text-orange-500 text-[#1b1b18] border border-transparent rounded-sm text-sm leading-normal cursor-pointer">
                        Mais Informações
                    </a>
                </div>
            </div>

            <div class="relative flex items-center justify-center">
                <div class="hidden lg:block absolute sm:w-[650px] rounded-full">
                    <svg version="1.1" id="svg1" viewBox="0 0 447 559" sodipodi:docname="fundo.svg"
                        inkscape:version="1.3.2 (091e20e, 2023-11-25, custom)"
                        xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
                        xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                        xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg">
                        <defs id="defs1" />
                        <sodipodi:namedview id="namedview1" pagecolor="#505050" bordercolor="#eeeeee" borderopacity="1"
                            inkscape:showpageshadow="0" inkscape:pageopacity="0" inkscape:pagecheckerboard="0"
                            inkscape:deskcolor="#505050" inkscape:zoom="1.4543828" inkscape:cx="223.80627"
                            inkscape:cy="279.5" inkscape:window-width="2560" inkscape:window-height="1009"
                            inkscape:window-x="-8" inkscape:window-y="-8" inkscape:window-maximized="1"
                            inkscape:current-layer="g1" />
                        <g inkscape:groupmode="layer" inkscape:label="Image" id="g1">
                            <path style="fill:#4ca9f5;stroke:none"
                                d="m 321.75031,43.859802 c -19.55356,2.567383 -40.28955,3.079255 -60,3.560975 -17.89995,0.437469 -34.23874,-0.41092 -51,7.324066 -31.35668,14.470459 -46.70833,48.832267 -81,59.945217 -26.05123,8.44244 -52.098802,-27.887636 -74.814822,-2.25079 -25.23082,28.47503 2.9189,55.3135 -2.64969,85.99615 -5.59131,30.80786 -33.65931,53.24442 -43.1913497,83 -2.77034,8.64798 -4.05698,17.97934 -2.76467,27 10.9998497,76.78168 111.5483317,50.03235 160.4205317,81.69907 20.35664,13.19009 16.44146,42.06826 31.46451,60.30017 28.92927,35.10849 88.75277,34.20865 129.53549,28.71219 5.83539,-0.78647 11.61648,-2.3678 17,-4.7508 45.64596,-20.20486 22.49527,-84.60043 34.74923,-121.96063 8.80051,-26.83124 42.87424,-20.80435 51.04242,-48 8.27994,-27.56775 -3.1593,-56.85797 0.49772,-85 2.58804,-19.91577 15.80169,-34.12469 8.96139,-55 -7.84247,-23.93372 -29.16214,-43.36502 -42.91742,-64 C 388.76831,87.961184 383.76419,73.098602 374.28272,61.435425 361.61084,45.847779 341.08109,41.321686 321.75031,43.859802 Z"
                                id="path1" />
                        </g>
                    </svg>

                </div>

                <img id="imagemLogo" class="hidden lg:block relative max-w-xl z-50" src="{{ asset('img/sistema.svg') }}"
                    alt="">
            </div>

        </main>
    </div>

    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.2/anime.min.js"
    integrity="sha512-aNMyYYxdIxIaot0Y1/PLuEu3eipGCmsEUBrUq+7aVyPGMFH8z0eTP0tkqAvv34fzN6z+201d3T8HPb1svWSKHQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="{{ asset('js/anime.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/gsap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/ScrollTrigger.min.js"></script>

<script src="{{ asset('js/gsap.js') }}"></script>

</html>
