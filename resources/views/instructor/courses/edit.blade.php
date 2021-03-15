<x-app-layout>
    <div class="container py-8 grid grid-cols-5">

        <aside>
            <h1 class="font-bold text-lg mb-4">Edición del curso</h1>
            <ul class="text-sm text-gray-600">
                <li class="leading-7 mb-1 border-l-4 border-indigo-400 pl-2">Edición del curso</li>
                <li class="leading-7 mb-1 border-l-4 border-transparent pl-2">Información del curso</li>
                <li class="leading-7 mb-1 border-l-4 border-transparent pl-2">Lecciones del curso</li>
                <li class="leading-7 mb-1 border-l-4 border-transparent pl-2">Metas del curso</li>
                <li class="leading-7 mb-1 border-l-4 border-transparent pl-2">Estudiantes</li>
            </ul>
        </aside>

        <div class="col-span-4 card">

            <div class="card-body text-gray-600">
                <h1 class="text-2xl font-bold">Información del curso</h1>
                <hr class="mt-2 mb-2">
                {!! Form::model($course, ['route' => ['instructor.courses.update', $course], 'method' => 'PUT', 'file' => true]) !!}

                @include('instructor.courses.partials.form')

                <div class="flex justify-end">
                    {!! Form::submit('Actualizar Información', ['class' => 'btn btn-primary cursor-pointer']) !!}
                </div>

                {!! Form::close() !!}
            </div>

        </div>

    </div>

    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script>
        <script src="{{ asset('js/instructor/courses/form.js') }}"></script>
    </x-slot>
</x-app-layout>
