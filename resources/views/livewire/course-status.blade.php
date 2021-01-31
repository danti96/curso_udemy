<div class="mt-8">
    <div class="container grid grid-cols-3 gap-8">
        <div class="col-span-2">
            {{-- Video --}}
            <div class="embed-responsive">
                {!!$current->iframe!!}
            </div>
            {{-- Nombre del curso --}}
            <div class="text 3xl text-gray-600 font-bold mt-4">
                {{$current->name}}
            </div>
            {{-- Descripción --}}
            @if($current->description)
                <div class="text-gray-600">
                    {{$current->description->home}}
                </div>
            @endif
            {{-- Marcar culminado curso --}}
            <div class="flex items-center mt-4 cursor-pointer">
                <i class="fas fa-toggle-off text-2xl text-gray-600"></i>
                <p class="text-sm ml-2">Marcar esta unidad como culminada</p>
            </div>
            {{-- Cambiar capitulo --}}
            <div class="card mt-2">
                <div class="card-body flex text-gray-500 font-bold">
                    @if($this->previous)
                        <a class="cursor-pointer" wire:click="changeLesson({{$this->previous}})" >Tema anterior</a>
                    @endif

                    @if($this->next)
                    <a class="ml-auto cursor-pointer" wire:click="changeLesson({{$this->next}})" >Siguiente tema</a>
                    @endif
                </div>
            </div>
        </div>
        {{-- Curso --}}
        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl leading-8 text-center mb-4">{{$course->title}}</h1>

                <div class="flex items-center">
                    <figure>
                        <img class="w-12 h-12 object-cover rounded-full mr-4" src="{{$course->teacher->profile_photo_url}}" alt="">
                    </figure>

                    <div> 
                        <p>{{$course->teacher->name}}</p>
                        <a class="text-blue-500 text-sm">{{'@'.Str::slug($course->teacher->name,'')}}</a>
                    </div>
                    
                </div>

                {{-- Porcentaje del curso completado --}}
                <p class="text-gray-600 text-sm mt-2">20% Completado</p>
                <div class="relative pt-1">
                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-gray-200">
                      <div style="width:30%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500"></div>
                    </div>
                </div>
                {{-- Lista del curso --}}
                <ul>
                    @foreach ($course->sections as $section)
                        <li class="text-gray-700 mb-4">{{-- Titulo --}}
                            <a class="font-bold text-base inline-block mb-4">{{$section->name}}</a>
                            <ul class="subindice">
                                @foreach ($section->lessons as $lesson)
                                    <li class="flex">{{-- Capitulo --}}
                                        <div>
                                            @if ($lesson->completed)
                                                @if ($current->id == $lesson->id)
                                                    <span class="inline-block w-4 h-4 border-2 border-yellow-500 rounded-full mr-2 mt-1"></span>
                                                @else
                                                    <span class="inline-block w-4 h-4 bg-yellow-500 rounded-full mr-2 mt-1"></span>
                                                @endif
                                            @else
                                                @if ($current->id == $lesson->id)
                                                    <span class="inline-block w-4 h-4 border-2 border-gray-500 rounded-full mr-2 mt-1"></span>
                                                @else
                                                 <span class="inline-block w-4 h-4 bg-gray-500 rounded-full mr-2 mt-1"></span>
                                                @endif
                                            @endif
                                        </div>
                                        <a wire:click="changeLesson({{$lesson}})" class="text-sm cursor-pointer">{{$lesson->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>

            </div>
        </div>
    </div>
    
    
</div>
