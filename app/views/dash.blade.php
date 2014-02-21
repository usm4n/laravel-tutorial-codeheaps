<div class="small-3 large-3 column">
    <aside class="sidebar">
        <h3>Menu</h3>
        <ul class="side-nav">
            <li>{{HTML::link('/','Home')}}</li>
            <li class="divider"></li>
            <li class="{{ (strpos(URL::current(),route('post.new'))!== false) ? 'active' : '' }}">
                {{HTML::linkRoute('post.new','New Post')}}
            </li >
            <li class="{{ (strpos(URL::current(),route('post.list'))!== false) ? 'active' : '' }}">
                {{HTML::linkRoute('post.list','List Posts')}}
            </li>
            <li class="divider"></li>
            <li class="{{ (strpos(URL::current(),route('comment.list'))!== false) ? 'active' : '' }}">
                {{HTML::linkRoute('comment.list','List Comments')}}
            </li>
        </ul>
    </aside>
</div>
<div class="small-9 large-9 column">
    <div class="content">
        @if(Session::has('success'))
        <div data-alert class="alert-box round">
            {{Session::get('success')}}
            <a href="#" class="close">&times;</a>
        </div>
        @endif
        {{$content}}
    </div>
    <div id="comment-show" class="reveal-modal small" data-reveal>
        {{-- quick comment --}}
    </div>
</div>

