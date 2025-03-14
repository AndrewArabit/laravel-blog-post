@extends('layouts.app')


@section('content')
<div class="mt-10">
    <ul class="mt-10 ">
        @forelse ($posts as $post)
          <li class="mb-4">
            <div class="book-item">
                
              <div
                class="flex flex-wrap items-center block">
                    <div class="w-full flex-grow sm:w-auto">
                        <a href="{{route('posts.show', [$post])}}" class="book-title">{{$post->name}}</a>

                        <span class="block text-gray-700 mb-5">
                           <x-date-formatter :date="$post->created_at"/>
                        </span>

                        
                        <div class="justify-between">
                            <div class="flex">
                                <p class="text-gray-700 break-words">{{ $post->post }}</p>
                            </div>
                            <div class="flex justify-end text-gray-700" >
                                <a href="{{route('posts.show', [$post])}}">🗨️ {{ $post->comments_count }} </a>
                            </div>
                        </div>
                    </div>
                    
                </div>
              {{-- <div
                class="flex flex-wrap items-center justify-between">
                <div class="w-full flex-grow sm:w-auto">
                  <a href="{{ route('books.show', $book) }}" class="book-title">{{ $book->title }}</a>
                  <span class="book-author">by {{ $book->author }}</span>
                </div>
                <div>
                  <div class="book-rating">
                    <x-star-rating :rating="$book->reviews_avg_rating" />
                  </div>
                  <div class="book-review-count">
                    out of {{ $book->reviews_count }} {{ Str::plural('review', $book->reviews_count) }}
                  </div>
                </div>
              </div> --}}
            </div>
          </li>
        @empty
          <li class="mb-4">
            <div class="empty-book-item">
              <p class="empty-text">No books found</p>
              <a href="{{ route('books.index') }}" class="reset-link">Reset criteria</a>
            </div>
          </li>
        @endforelse
    </ul>
</div>
  
@endsection
