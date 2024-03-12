<x-layout>


    @foreach ($posts as $post) 
        
        <article>
            <h1>
                <a href="/posts/{{ $post->slug }}">
                    {!! $post -> title; !!}
                </a>
            </h1>

            <p>
                <a href="/categories/{{ $post->category->slug }}"> {{ $post->category->name; }} </a>
            </p>

            {{ $post -> excerpt; }}

        </article>

    @endforeach

</x-layout>
    
