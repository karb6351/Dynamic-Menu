<ul class="menu">
    @forelse($menu as $item)
        @if($item->show)
            <li class="menu-item {{ $item->children->isEmpty() ? '' : 'has-children' }}">
                <a href="{{ url($item->url) }}" class="">{{ $item->name_en }}</a>
                @if (!$item->children->isEmpty())
                    @include('frontend.inc.menu', ['menu' => $item->children])
                @endif
            </li>
        @endif
    @empty
    @endforelse
</ul>


{{--<style>--}}
    {{--ul.menu{--}}
        {{--display: flex;--}}
        {{--align-items: flex-start;--}}
        {{--list-style: none;--}}
        {{--padding: 10px;--}}
    {{--}--}}
    {{--li.menu-item{--}}
        {{--list-style: none;--}}
    {{--}--}}
    {{--li.menu-item a{--}}
        {{--padding: 10px;--}}
        {{--display: block;--}}
    {{--}--}}
    {{--li.has-children > ul.menu{--}}
        {{--flex-direction: column;--}}
        {{--padding: 0px;--}}
        {{--margin: 0px;--}}
        {{--max-height: 0px;--}}
        {{--overflow-y: hidden;--}}
        {{--transition: 200ms all ease-in-out;--}}
    {{--}--}}
    {{--li.has-children > ul.menu > li.menu-item a{--}}
        {{--padding: 5px;--}}
        {{--margin: 0px 10px;--}}
    {{--}--}}
    {{--li.has-children:hover > ul.menu{--}}
        {{--max-height: 1000px;--}}
    {{--}--}}

    {{--li.has-children > ul.menu > li.has-children > ul.menu > li.menu-item a{--}}
        {{--padding: 5px 10px;--}}
    {{--}--}}
{{--</style>--}}

