<x-app-layout>
    {{--  Portada --}}
    <section class="bg-cover" style="background-image: url({{ asset('img/home/pexels-buro-millennial.jpg') }})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-white font-fold  text-4xl">Domina la tecnología web con Coders Free</h1>
                <p class="text-white text-lg mt-2">En Coders Free encontrarás cursos, manuales y artículos que te ayudarán a convertirte en un profesional del desarrollador web.</p>
                <!-- component -->
                @livewire('search')
            </div>
        </div>
    </section>
    {{-- Contenido --}}
    <section class="mt-24">
        <h1 class="text-gray-600 text-center text-3xl mb-6">CONTENIDO</h1>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            <article>
                <figure>
                    <img class="rounded-xl h-40 w-full object-cover" src="{{asset('img/home/pexels-andrea-piacquadio-3769981.jpg')}}" alt="" >
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Cursos Y Proyectos</h1>
                    <p class="text-sm text-gray-500 text-justify">Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500. Fue popularizado en los 60s con la creación de las hojas "Letraset".
                    </p>
                </header>
            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-40 w-full object-cover" src="{{asset('img/home/pexels-pixabay-373543.jpg')}}" alt="" >
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Manual De Laravel</h1>
                    <p class="text-sm text-gray-500 text-justify">Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500. Fue popularizado en los 60s con la creación de las hojas "Letraset".
                    </p>
                </header>
            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-40 w-full object-cover" src="{{asset('img/home/pexels-pixabay-396441.jpg')}}" alt="" >
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Blog</h1>
                    <p class="text-sm text-gray-500 text-justify">Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500. Fue popularizado en los 60s con la creación de las hojas "Letraset".
                    </p>
                </header>
            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-40 w-full object-cover" src="{{asset('img/home/wBMKmZH.jpg')}}" alt="" >
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Desarrollo Web</h1>
                    <p class="text-sm text-gray-500 text-justify">Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500. Fue popularizado en los 60s con la creación de las hojas "Letraset".
                    </p>
                </header>
            </article>
        </div>
    </section>
    <section class="mt-24 bg-gray-700 py-12">
        <h1 class="text-center text-white text-3xl">¿No sabes qué curso llevar?</h1>
        <p class="text-center text-white">Dirígete al catálogo de cursos y filtralos por categoría o nivel</p>
        <!-- Using utilities: -->
        <div class="flex justify-center mt-4">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <a href="{{route('courses.index')}}">Catálogo de cursos</a>
            </button>
        </div>
    </section>
    <section class="my-24">
        <h1 class="text-center text-3xl text-gray-600">ÚLTIMOS  Cursos</h1>
        <p class="text-center text-gray-500 text-sm mb-6">Trabajo duro para seguir subiendo cursos</p>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            @foreach ($coursers as $course)
                <x-course-card :course="$course"/>
            @endforeach
        </div>
    </section>
</x-app-layout>