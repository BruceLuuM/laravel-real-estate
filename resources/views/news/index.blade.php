<x-layout>
    @include('index_elements._logo')

    <x-card>
        <div class="top-news">
            <div class=top-search>
                <h3>
                    <span>BẤT ĐỘNG SẢN NỔI BẬT </span>
                </h3>
            </div>
            <x-news.list-ahead-news :news="$news" />
        </div>

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

        <div class="top-news">
            <div class=top-search>
                <h3>
                    <span>DỰ ÁN NỔI BẬT </span>
                </h3>
            </div>
            <x-projects.list-ahead-projects :projects="$projects" />
        </div>


    </x-card>
</x-layout>