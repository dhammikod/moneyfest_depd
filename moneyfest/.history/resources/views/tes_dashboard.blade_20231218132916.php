{{$result}}
<p>
@foreach ($sample as $item)
    @foreach ($item as $items)
    {{$items}}
    @endforeach
@endforeach
</p>
lorem ipsum
<p>@foreach ($targets as $item)
    {{$item}}
@endforeach</p>
