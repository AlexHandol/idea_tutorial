<div class="row">
    <form action="{{ route('ideas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <textarea name="idea-content" class="form-control" id="idea-content" rows="3"></textarea>
            @error('idea-content')
                <span class="d-block fs-6 text-danger mt-2">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="">
            <button type="submit" class="btn btn-dark"> Share </button>
        </div>
    </form>
</div>
