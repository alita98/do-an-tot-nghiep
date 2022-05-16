@extends('layouts.app')

@section('content')
    <div class="w-4/5 m-auto text-left">
        <div class="py-15">
            <h1 class="text-6xl">Tiêu đề: 
                {{ $post->title }}
            </h1>
        </div>
        <img src="{{ asset('images/' . $post->image_path) }}" width="500" alt="">
    </div>
    
    <div class="w-4/5 m-auto pt-20">
    
        <span class="text-gray-500">
            Bởi <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
        </span>

        <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">Nội dung: 
            {{ $post->description }}
        </p>
    </div>
    <h4>Tất cả đóng góp</h4>
        @include('partials._comment_replies', ['comments' => $post->comments, 'post_id' => $post->id])
        <hr />
    <br>
        <form method="post" action="{{ route('comment.add') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="comment_body" class="form-control" required />
                <input type="hidden" name="post_id" value="{{ $post->id }}" /> <br>
                <input type="submit" class="btn btn-success " value="Thêm bình luận" />
            </div>
        </form>

@endsection 