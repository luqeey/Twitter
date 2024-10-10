@extends('layout.layout')
@section('content')
    <div class="mt-3">
        <div class="card bg-white shadow-md rounded-lg overflow-hidden">
            <div class="px-6 py-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <img class="w-12 h-12 rounded-full mr-4" src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario" alt="Mario Avatar">
                        <div>
                            <h5 class="text-xl font-semibold"><a href="#">Jozo</a></h5>
                        </div>
                    </div>
                    <div>
                        <form action="{{ route('post.destroy', $post->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm bg-red-500 text-white px-3 py-1 rounded">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="px-6 py-4">
                <p class="text-gray-700 text-base">
                    {{ $post->content }}
                </p>
                <div class="flex justify-between items-center mt-4">
                    <div>
                        <a href="#" class="text-blue-500 hover:underline">
                            <span class="fas fa-heart mr-1"></span> {{ $post->likes }} likes
                        </a>
                    </div>
                    <div>
                        <span class="text-gray-600 text-sm"><span class="fas fa-clock mr-1"></span> 3-5-2023</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
