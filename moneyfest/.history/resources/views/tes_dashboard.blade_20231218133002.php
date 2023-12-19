{{$result}}
<div>
@foreach ($sample as $item)
    @foreach ($item as $items)
    <p>{{$items}}</p>
    @endforeach
@endforeach
</div>
lorem ipsum
<p>@foreach ($targets as $item)
    {{$item}}
@endforeach</p>
