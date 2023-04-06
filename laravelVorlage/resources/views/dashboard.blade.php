<x-app-layout>
    <x-slot name="header">
        <h2 class="py-4 text-center">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStory">
        Add Story
    </button>

    <!-- Modal -->
    <div class="modal fade" id="addStory" tabindex="-1" aria-labelledby="addStoryLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addStoryLabel">Add Story</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" enctype="multipart/form-data" action="{{ url('addStory') }}">
                    @csrf
                    <div class="modal-body">
                        {{-- Input Text --}}
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="addHeadline">
                            <label for="floatingInput">Headline</label>
                        </div>
                        {{-- Textarea --}}
                        <div class="form-floating">
                            <textarea class="form-control" id="floatingTextarea" name="addStory" style="height: 100px"></textarea>
                            <label for="floatingTextarea">Story</label>
                        </div>
                        {{-- Input File--}}
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Background</label>
                            <input class="form-control" type="file" name="addBackground" id="formFile">
                        </div>

                        <div class="d-flex">
                            @foreach($stories as $story)
                                <div class="form-check">
                                    <input class="form-check-input" name="relation[]" type="checkbox" value="{{ $story->id }}" id="flexCheck">
                                    <label class="form-check-label" for="flexCheck">
                                        {{ $story->headline }}
                                    </label>
                                </div>
                            @endforeach
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="p-4">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            @foreach($stories as $story)
                <div class="col">
                    <div class="card">
                        @if($story->background)
                            <img class="card-img-top" src="{{ asset('uploads/'.$story->background) }}"
                                 alt="Card image cap">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $story->headline }}</h5>
                            <p class="card-text">{{ $story->story }}</p>
                            <hr>
                            <div class="border p-2">
                                <h4>Related</h4>
                                @foreach($story->stories as $relation)
                                    <h6 class="card-title">{{ $relation->headline }}</h6>
                                    <p class="card-text">{{ $relation->story }}</p>
                                @endforeach
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="button" class="btn btn-dark edit" data-id="{{ $story->id }}">Edit</button>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
