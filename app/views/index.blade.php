@if(!empty($notFound))
<p>Sorry nothing found for your query!</p>
@else
@foreach($posts as $post)
	<article class="post">
		<header class="post-header">
			<h1 class="post-title">
				{{link_to_route('post.show',$post->title,$post->id)}}
			</h1>
			<div class="clearfix">
				<span class="left date">{{explode(' ',$post->created_at)[0]}}</span>
				<span class="right label">{{$post->comment_count}} comments </span>
			</div>
		</header>
		<div class="post-content">
			<p>{{$post->read_more.' ...'}}</p>
			<span>{{link_to_route('post.show','Read full article',$post->id)}}
		</div>
		<footer class="post-footer">
			<hr>
		</footer>
	</article>
@endforeach
{{$posts->links()}}
@endif
