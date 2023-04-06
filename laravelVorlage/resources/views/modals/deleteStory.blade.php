<!-- Modal -->
<div class="modal fade" id="deleteStory" tabindex="-1" aria-labelledby="deleteStoryLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteStoryLabel">Delete: {{ $story->headline }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ url('deleteStory') }}">
                @csrf
                <input type="hidden" name="storyId" value="{{ $story->id }}">
                <div class="modal-body">
                    <p>Willst du das wirklich?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
