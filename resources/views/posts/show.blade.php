@extends("layouts.app")

@section("content")

<div class="mb-4 text-sm rounded-md bg-white p-4 leading-6 text-slate-900 shadow-md shadow-black/5 ring-slate-700/10;">
    <div class="flex flex-wrap items-center block">
        <div class="w-full flex-grow sm:w-auto">
            <div><a href="{{route('posts.index')}}" class="reset-link">Go back to post page!</a></div>
            <a href="" class="book-title">{{$post->name}}</a>

            <span class="block text-gray-700 mb-5">
                <x-date-formatter :date="$post->created_at"/>
            </span>

            <div class="justify-between">
                <div class="flex">
                    <p class="text-gray-700 break-words">{{ $post->post }}</p>
                </div>
                <div class="flex justify-end text-gray-700"></div>
            </div>

            <div class="mt-4 w-full h-px bg-gray-300"></div>

            <div class="flex justify-between items-center">
                <div class="flex text-gray-700">
                    <h5 class="mb-2 mt-4">Comments</h5>
                </div>
                <div class="flex justify-end text-gray-800">
                    🗨️ {{ count($post->comments) }} 
                </div>
            </div>
            

            <!-- Comment Box fixed at the bottom of the post -->
            <div class="relative mb-4">
                <div class="sticky bottom-0 left-0 w-full bg-white p-3 ">
                    <div class="relative">
                        <form  method="POST" action="{{ route('posts.comments.store', $post) }}">
                            @csrf
                            <input type="hidden" id="name" name="name" value="test">
                            <textarea 
                                class="inputshadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none rounded-md border-slate-300 resize-none max-h-60 pr-12"
                                id="comment" rows="1"
                                placeholder="Write a comment..."
                                name="comment"
                            ></textarea>
                            <button 
                                class="absolute right-2 bottom-2 bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-full"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M22 2L11 13"></path>
                                    <path d="M22 2L15 22 11 13 2 9 22 2z"></path>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <ul>
                    @forelse ($post->comments as $comment)
                        <li class="book-item mb-4">
                            <div>
                                <div>
                                    <h4>{{$comment->name}}</h4>
                                    <p>{{$comment->comment}}</p>
                                </div>
                                <div class="mb-2 flex items-center">
                                    <div class="book-review-count">
                                        {{ $comment->relative_date }}
                                    </div>
                                </div>
                            </div>
                        </li>
                    @empty
                        <li class="mb-4">
                            <div class="empty-book-item">
                                <p class="empty-text text-lg font-semibold">No reviews yet</p>
                            </div>
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>



@endsection

<script>
    const textarea = document.getElementById('commentBox');

    textarea.addEventListener('input', () => {
        textarea.style.height = 'auto';
        textarea.style.height = textarea.scrollHeight + 'px';
    });
</script>