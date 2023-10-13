<x-layout>
    <x-card>
        <div class="Detail_container">
            {{--
            <x-categories.side-categories-investers-bar :categories="$categories" :investers="$investers" /> --}}
            <div class="Detail_project">
                <h3>
                    <span> {{ $news_blog->title }}</span>
                </h3>
                <p class="Project_description">
                    {!! $news_blog->text !!}
                </p>
            </div>
            <div class="Diff_project">
                <div class="inLogo_container" style="">
                    <h3>
                        <span>DỰ ÁN CÙNG KHU VỰC</span>
                    </h3>
                    {{--
                    <x-projects.list-ahead-projects :projects="$projects_province_related" /> --}}
                </div>
                <div class="inLogo_container" style="">
                    <h3>
                        <span>ĐÁNH GIÁ</span>
                    </h3>
                    {{--
                    <x-projects.list-ahead-projects :projects="$projects_province_related" /> --}}
                </div>
                <div class="inLogo_container" style="">
                    <h3>
                        <span>NỘI DUNG ĐÁNH GIÁ</span>
                    </h3>
                    {{--
                    <x-projects.list-ahead-projects :projects="$projects_province_related" /> --}}
                </div>
            </div>
        </div>
    </x-card>
</x-layout>