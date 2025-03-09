<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Laravel - BLOG SIMPLE CRUD</title>
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio"></script>

  {{-- blade-formatter-disable --}}
  <style type="text/tailwindcss">
    .btn {
      @apply bg-white rounded-md px-4 py-2 text-center font-medium text-slate-500 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50 h-10;
    }

    .search-btn {
        @apply bg-white rounded-md px-4 py-2 text-center font-medium text-slate-500 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50 h-9 
        flex items-center justify-center;
    }


    .input {
      @apply shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none rounded-md border-slate-300;
    }

    .filter-container {
      @apply mb-4 flex space-x-2 rounded-md bg-slate-100 p-2;
    }

    .filter-item {
      @apply flex w-full items-center justify-center rounded-md px-4 py-2 text-center text-sm font-medium text-slate-500;
    }

    .filter-item-active {
      @apply bg-white shadow-sm text-slate-800 flex w-full items-center justify-center rounded-md px-4 py-2 text-center text-sm font-medium;
    }

    .book-item {
      @apply text-sm rounded-md bg-white p-4 leading-6 text-slate-900 shadow-md shadow-black/5 ring-1 ring-slate-700/10;
    }

    .book-title {
      @apply text-lg font-semibold text-slate-800 hover:text-slate-600;
    }

    .book-author {
      @apply block text-slate-600;
    }

    .book-rating {
      @apply text-sm font-medium text-slate-700;
    }

    .book-review-count {
      @apply text-xs text-slate-500;
    }

    .empty-book-item {
      @apply text-sm rounded-md bg-white py-10 px-4 text-center leading-6 text-slate-900 shadow-md shadow-black/5 ring-1 ring-slate-700/10;
    }

    .empty-text {
      @apply font-medium text-slate-500;
    }

    .reset-link {
      @apply text-slate-500 underline;
    }
    .error-message {
      @apply text-red-500 text-sm mt-0;
    }

    .navbar {
        @apply text-red-50 p-4 fixed top-0 left-0 w-full shadow-md 
    }
  </style>
  {{-- blade-formatter-enable --}}
</head>

<body class="container mx-auto mt-10 mb-10 max-w-3xl">
    <nav class="text-red-50 p-4 fixed top-0 left-0 w-full shadow-md bg-white flex flex-wrap justify-between">
        <ul class="flex space-x-4 items-center">
            <form action="{{ route('posts.create') }}"></form>
            <li><a href="#" class="text-[#f53003] text-2xl hover:text-red-800">Blog</a></li>
            <li><input type="text" name="" id="" class="input" placeholder="Search..."></li>
            <li>
                <button class="search-btn">Search</button>
            </li>
            <li class="text-[#f53003] font-medium hover:text-red-800">Posts</li>
        </ul>
    </nav>

    <div class="content-wrapper mt-20">
        @yield('content')
    </div>
</body>


</html>