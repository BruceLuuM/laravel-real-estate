{{-- set up <x-card> tag--}}
{{-- More information: https://laravel.com/docs/9.x/blade#dynamic-components --}}

<div {{$attributes->merge(['class'=>'container'])}}>
    {{$slot}}
</div>