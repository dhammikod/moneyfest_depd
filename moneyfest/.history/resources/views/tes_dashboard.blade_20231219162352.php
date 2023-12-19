{{-- {{$model}} --}}
<div>
    {{-- @foreach ($sample as $item)
<p>
    @foreach ($item as $items)
    {{$items}}
    @endforeach
</p>
@endforeach --}}
</div>
lorem ipsum
{{-- <p>{{count($target)}}</p>
<p>{{count($traindata)}}</p> --}}
@foreach ($item as $items)
{{$items}}
@endforeach

{{$prediction}}
{{$equation}}
{{-- {{var_dump($traindata)}} --}}
{{-- <p> 
    @foreach ($traindata as $item)
        @foreach ($item as $items)
            {{ $items }}
        @endforeach
        p
    @endforeach
</p>

<p>
    @foreach ($target as $item)
        {{ $item }}
    @endforeach
</p>  --}}
