<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }}
        </h2>
        <div class="nav">
            <nav>
                <ul>
                    <li>
                        <a href="">Home</a>
                    </li>
                    <li>
                        <a href="">Add User</a>
                    </li>
                    <li>
                        <a href="">Posts</a>
                    </li>
                </ul>
            </nav>
        </div>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                    <form method="post" action="{{route('posts.store')}}">
            @csrf 
            <div class="wrapper">
                <label>Body</label><br>
                <textarea name="body" id="body" cols="30" rows="10" placeholder="Post Something"> </textarea>
            </div>
            <button type="submit"class="btn">Post</button>
        </form>

        @if($posts->count())
            @foreach($posts as $post)
            <div class="ln">
                <a href="">{{ $post->user->name}}</a><span>{{$post->created_at->diffForHumans()}}</span>

                <p>{{$post->body}}</p>
                <div class="like">
                    <form action="{{route('posts.likes', $post->id)}}" method="post">
                        @csrf
                        <button class="lke" type="submit">Like</button>
                    </form>
                    <form action="" method="post">
                        @csrf
                        <button class="lke" type="submit">Unlike</button>
                    </form>
                    <span>{{$post->likes->count()}} {{ Str::plural('like', $post->likes->count())}}</span>
                </div>
            </div>

            @endforeach
            {{ $posts->links() }}
        @else
            <p>There are no Posts at the moment</p>
        @endif
                </div>
            </div>
        </div>
       
    </div>

    
</x-app-layout>
