@extends('app')

{{-- Include Post View Title --}}
@section('title',"Just Post It !")

{{-- Include Post View Content when it get called --}}
@section('content')
<div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-lg">
        @auth
            <form action="{{route('posts')}}" method="post" class="mb-5">
                @csrf
                <label for="body" class="sr-only">Body</label>
                <textarea name="body" id="body" cols="30" rows="4"
                class="bg-gray-100 border-2 w-full p-4 rounded-lg mb-4 
                focus:border-blue-400 outline-none  
                @error('body') border-red-600 @enderror" placeholder="Post something !">
                </textarea>
                @error('body')
                    <div class="text-red-5OO mt-2 text-sm">
                        {{$message}}
                    </div>
                @enderror
                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 
                    rounded font-medium">Post</button>
                </div>
            </form>
        @endauth

        
        


        @if ($posts->count())
            @foreach ($posts as $post)
                <div class="mb-4">
                    <a class="font-bold">
                        {{$post->user->name}}
                        <span class="text-sm text-gray-600 font-medium">
                            {{$post->created_at->diffForHumans()}}
                        </span>
                    </a>
                <p class="mb-3">{{ $post->body}}</p>

                {{-- Delete Button  --}}
                @can('delete', $post)
                    <form action="{{route('posts.destroy',$post)}}" method="POST" class="mr-2">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="text-blue-500">Delete</button>
                    </form>
                @endcan
              

                <div class="flex item-center">
                @if (!$post->likeBy(auth()->user()))
                    <form action="{{route('posts.likes',$post)}}" method="POST" class="mr-2">
                        @csrf
                        <button type="submit" class="text-blue-500">Like</button>
                    </form>
                @else
                    <form action="{{route('posts.likes',$post)}}" method="POST" class="mr-2">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="text-blue-500">UnLike</button>
                    </form>
                @endif


                    <span>
                        {{$post->likes->count()}} {{ Str::plural('like', $post->likes->count()) }}
                    </span>
                </div>
                {{-- Like and Unlike Button  --}}
                
                </div>
            @endforeach
            {{$posts->links()}}
        @else
            <p class="text-lg text-gray-500 text-center">There are no posts</p>
        @endif


    </div>
</div>
@endsection