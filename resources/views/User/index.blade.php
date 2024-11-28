<x-app-layout>
    <x-slot name="header">
        　ユーザー投稿
    </x-slot>
    <div class="own_posts">
        @foreach($own_posts as $post)
            <div>
                <h4><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h4>
                <img src="{{ asset('storage/images/' . $post->image) }}" style="width:18rem;" />
                <small>{{ $post->user->name }}</small>
                <p>{{ $post->body }}</p>
            </div>
        @endforeach
        
        <div class='paginate'>
            {{ $own_posts->links() }}
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </div>
</x-app-layout>