<x-app-layout>
    <x-slot name="header">
        <h2 class="py-4 text-center">
            {{ $story->headline }}
        </h2>
    </x-slot>
    <style>
        article {
            background-image: url("{{ asset('uploads/' . $story->background) }}");
            min-height: 90vh;
            background-size: cover;
        }
    </style>
    <article class="d-flex justify-content-center align-items-center">
        <div class="card bg-light">
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
