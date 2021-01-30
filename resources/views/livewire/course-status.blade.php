<div class="mt-8">
    <div class="container grid grid-cols-3 gap-8">
        <div class="col-span-2">
            {!!$current->iframe!!}
            {{$current->name}}
        </div>
        <div class="card">
            <div class="card-body">
                <h1 class="text-gray-700">{{$course->title}}</h1>

                <div class="flex items-center">
                    <figure>
                        <img class="" src="{{$course->teacher->profile_photo_url}}" alt="">
                    </figure>

                    <div> 
                        <p>{{$course->teacher->name}}</p>
                        <a href="" class="text-blue-500">{{'@'.Str::slug($course->teacher->name,'')}}</a>
                    </div>
                </div>

                <ul>
                    @foreach ($course->sections as $section)
                        <li>
                            <a href="" class="font-bold">{{$section->name}}</a>
                            <ul>
                                @foreach ($section->lessons as $lessons)
                                    <li>
                                        <a href="" class="text-sm">
                                            {{$lessons->id}}
                                            @if($lessons->completed)
                                                (completado)
                                            @endif
                                        </a>
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
