@props(['course'])
<article class="card">
    <img src="{{Storage::url($course->image->url)}}" class="h-36 w-full object-cover">
    <div class="card-body">
        {{-- solo 40 caracteres str::limit --}}
        <h1 class="card-title">{{Str::limit($course->title,40)}}</h1>
        {{-- Relacion teacher --}}
        <p class="text-gray-500 text-sm mb-2">Prof:{{$course->teacher->name}}</p>
        {{-- iconos de fonteawesome-free --}}
        <div class="flex">
            <ul class="flex text-sm">
                <li class="mr-1"><i class="fas fa-star text-{{$course->rating >= 1? 'yellow':'gray'}}-400"></i></li>
                <li class="mr-1"><i class="fas fa-star text-{{$course->rating >= 2? 'yellow':'gray'}}-400"></i></li>
                <li class="mr-1"><i class="fas fa-star text-{{$course->rating >= 3? 'yellow':'gray'}}-400"></i></li>
                <li class="mr-1"><i class="fas fa-star text-{{$course->rating >= 4? 'yellow':'gray'}}-400"></i></li>
                <li class="mr-1"><i class="fas fa-star text-{{$course->rating == 5? 'yellow':'gray'}}-400"></i></li>
            </ul>
            <p class="text-sm text-gray-500 ml-auto">
                <i class="fas fa-users"></i>
                ({{$course->students_count}})
            </p>
        </div>
        <!-- Using utilities: -->
        <a href="{{route('courses.show', $course)}}" class="mt-4 btn btn-primary btn-block">
            Mas Información
        </a>
    </div>
</article>