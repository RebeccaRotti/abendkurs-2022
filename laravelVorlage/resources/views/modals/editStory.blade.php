<!-- Modal -->
<div class="modal fade" id="editStory" tabindex="-1" aria-labelledby="editStoryLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editStoryLabel">Edit Story</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" enctype="multipart/form-data" action="{{ url('editStory') }}">
                @csrf
                <input type="hidden" name="storyId" value="{{ $entry->id }}">
                <div class="modal-body">
                    {{-- Input Text --}}
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="editHeadline" value="{{ $entry->headline }}">
                        <label for="floatingInput">Headline</label>
                    </div>
                    {{-- Textarea --}}
                    <div class="form-floating">
                        <textarea class="form-control" id="floatingTextarea" name="editStory" style="height: 100px">{{ $entry->story }}</textarea>
                        <label for="floatingTextarea">Story</label>
                    </div>
                    {{-- Input File--}}
                    <div class="my-3">
                        <label for="formFile" class="form-label">Background</label>
                        <input class="form-control" type="file" name="editBackground" id="formFile">
                    </div>

                    <div class="p-3 row row-cols-1 row-cols-md-2 row-cols-xl-3 g-4">
                        @foreach($stories as $story)
                            <div class="form-check">
                                <input class="form-check-input" name="relation[]" type="checkbox" value="{{ $story->id }}" id="flexCheck"
                            @if($story->hasStory($entry->id)) checked @endif >
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
