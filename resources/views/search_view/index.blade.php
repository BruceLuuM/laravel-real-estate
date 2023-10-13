<x-layout>
    <div id="search_view" style="display: block">
        <div class="container search_bar">
            @include('index_elements._search')
        </div>
    </div>
    <x-card>
        <div>
            <x-categories.side-categories-investers-bar :categories="$categories" :investers="$investers" />
            <div class="info">
                <div class="news_container">
                    <h3>
                        <span>BẤT ĐỘNG SẢN DÀNH CHO BẠN</span>
                    </h3>
                    @if(count($news) == 0)
                    <p>No news found</p>
                    @else
                    @foreach ($news as $new)
                    <x-news.news-container :new="$new" />
                    @endforeach
                    @endif
                    <br>
                    <table>
                        {{$news->links('vendor.pagination.tailwind')}}
                    </table>
                </div>
            </div>
        </div>
    </x-card>
</x-layout>