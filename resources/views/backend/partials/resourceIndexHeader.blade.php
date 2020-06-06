<div class="flex flex-col items-center justify-between lg:flex-row">
    <h1>{{$title}}</h1>
    @can('create', $modelClass)
        <button class="btn btn-teal inline-block w-full lg:w-auto"><a href="{{$createRoute}}">{{$addResourceText}}</a></button>
    @endcan
</div>
