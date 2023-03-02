<x-layout>
    <div class="top-news">
        <div class=top-search>
            <h3>{{$category->type}}</h3>
        </div>
        <x-news.list-ahead-news :news="$news" />
    </div>
    <div class="top-news">
        <div class=top-search>
            <h3>{{$category->type}}. {{$category->type_name}}</h3>
        </div>
        <x-news.list-ahead-news :news="$news" />
    </div>
</x-layout>