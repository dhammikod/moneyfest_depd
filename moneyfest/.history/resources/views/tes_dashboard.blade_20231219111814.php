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
<p>
    @foreach ($result as $item)
        @foreach ($item as $items)
            {{ $items }}
        @endforeach
        p
    @endforeach
</p>

<p>
    @foreach ($traindata as $item)
        @foreach ($item as $items)
            {{ $items }}, 
        @endforeach
        p
    @endforeach
</p>

<p>
    @foreach ($target as $item)
        {{ $item }}
    @endforeach
</p>
