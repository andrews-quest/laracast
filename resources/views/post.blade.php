<!doctype html>

<title>My Blog</title>

<body>
    <main>
        <h1>{!! $post->title !!}</h1>
        <article id="a">
            <p>
                By <a href="#">{{ $post->user->name }}</a> in <a href="/categories/{{ $post->category->slug }}"> {{ $post->category->name }} </a>
            </p>
                
            <div>
                {!! $post->body !!}
            </div>   

        </article>

        <a href="/">Go Back</a>
    </main>
</body>