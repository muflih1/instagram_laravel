@extends('layout.layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-4">
            <h1 class="fs-3 mb-3">Create new post</h1>
            <form action="{{ route('p.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <textarea 
                        name="caption" 
                        id="caption" 
                        class="form-control" 
                        placeholder="Write a caption.."
                        rows="4"
                    >{{ old('caption') }}</textarea>
                </div>
                <div class="mb-3">
                    <input
                        type="file" 
                        name="image-upload" 
                        id="image-upload" 
                        class="form-control mb-3"
                    />
                    <input type="hidden" id="image" name="image" />
                    <img src="" alt="" id="preview" style="display: none; max-width: 100%;" />
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Share</button>
                </div>
            </form>
        </div>
    </div>
@endsection