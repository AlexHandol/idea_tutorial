<div class="row">
    <form action="{{ route('ideas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <textarea name="content" class="form-control" id="ideaContent" rows="3"></textarea>
            @error('content')
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
