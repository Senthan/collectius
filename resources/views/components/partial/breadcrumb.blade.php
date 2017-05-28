<ul class="breadcrumb">
    @foreach($breadcrumb as $item)
        <li class="{{ $item['class'] }}">
            @if(isset($item['route']))
                {!! link_to_route($item['route'], $item['text'], $item['parameters']) !!}
            @else
                {{ $item['text'] }}
            @endif
        </li>
    @endforeach
</ul>