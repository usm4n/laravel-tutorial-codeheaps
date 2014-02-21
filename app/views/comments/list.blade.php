<h2 class="comment-listings">Comment listings</h2><hr>
<table>
    <thead>
    <tr>
        <th>Commenter</th>
        <th>Email</th>
        <th>At Post</th>
        <th>Approved</th>
        <th>Comment Delete</th>
        <th>Comment View</th>
    </tr>
    </thead>
    <tbody>
    @foreach($comments as $comment)
    <tr>
        <td>{{{$comment->commenter}}}</td>
        <td>{{{$comment->email}}}</td>
        <td>{{$comment->post->title}}</td>
        <td>
            {{Form::open(['route'=>['comment.update',$comment->id]])}}
            {{Form::select('status',['yes'=>'Yes','no'=>'No'],$comment->approved,['style'=>'margin-bottom:0','onchange'=>'submit()'])}}
            {{Form::close()}}
        </td>
        <td>{{HTML::linkRoute('comment.delete','Delete',$comment->id)}}</td>
        <td>{{HTML::linkRoute('comment.show','Quick View',$comment->id,['data-reveal-id'=>'comment-show','data-reveal-ajax'=>'true'])}}</td>
    </tr>
    @endforeach
    </tbody>
</table>
{{$comments->links()}}
