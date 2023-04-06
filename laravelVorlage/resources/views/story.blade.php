<x-app-layout>
    <x-slot name="header">
        <h2 class="py-4 text-center bg-light">
            {{ $story->headline }}
        </h2>
    </x-slot>
    <style>
        body {
            background-image: url("{{ asset('uploads/' . $story->background) }}");
            background-size: cover;
        }
    </style>
    <article class="mt-5 pt-5 d-flex justify-content-center align-items-center">
        <div class="container card bg-light">
            <div class="card-body">
                <p class="card-text">{{ $story->story }}</p>
            </div>
            <div class="card-footer">
                <ul>
                    @foreach($story->related as $rel)
                        <li>
                            <a href="{{ url('story', ['storyId' => $rel->id]) }}">{{ $rel->headline }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </article>
</x-app-layout>
