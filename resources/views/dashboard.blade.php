@extends('layout.layout')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('layout.left-sidebar')
        </div>
        <div class="col-6">
            @include('includes.success-message')
            <h4>Share yours ideas</h4>
            @include('includes.submit-idea')
            <hr>
            @foreach ($ideas as $idea)
                <div class="mt-3">
                    @include('includes.idea-card')
                </div>
            @endforeach
            <div class="mt-3">
                {{ $ideas->links() }}
            </div>
        </div>
        <div class="col-3">
            @include('includes.search-bar')
            @include('includes.follow-box')
        </div>
    </div>
@endsection
