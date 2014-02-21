<article class="post">
    <header class="post-header">
        <h1 class="post-title">
            {{$post->title}}
        </h1>
        <div class="clearfix">
            <span class="left date">{{explode(' ',$post->created_at)[0]}}</span>
            <span class="right label">{{HTML::link('#reply','Reply',['style'=>'color:inherit'])}} </span>
        </div>
    </header>
    <div class="post-content">
        <p>{{ $post->content }}</p>
    </div>
    <footer class="post-footer">
        <hr>
    </footer>
</article>
<section class="comments">
    @if(!$comments->isEmpty())
        <h2>Comments on {{$post->title}}</h2>
        <ul>
            @foreach($comments as $comment)
                <li>
                    <article>
                        <header>
                            <div class="clearfix">
                                <span class="right date">{{explode(' ',$comment->created_at)[0]}}</span>
                                <span class="left commenter">{{link_to_route('post.show',$comment->commenter,$post->id)}}</span>
                            </div>
                        </header>
                        <div class="comment-content">
                            <p>{{{$comment->comment}}}</p>
                        </div>
                        <footer>
                            <hr>
                        </footer>
                    </article>
                </li>
            @endforeach
        </ul>
    @else
        <h2>No Comments on {{$post->title}}</h2>
    @endif
    <!--comment form -->
    @include('comments.commentform')
</section>
