<h2 class="new-post">
    Add New Post
    <span class="right">{{ HTML::link('admin/dash-board','Cancel',['class' => 'button tiny radius']) }}</span>
</h2>
<hr>
{{ Form::open(['route'=>['post.save']]) }}
<div class="row">
    <div class="small-5 large-5 column">
        {{ Form::label('title','Post Title:') }}
        {{ Form::text('title',Input::old('title')) }}
    </div>
</div>
<div class="row">
    <div class="small-7 large-7 column">
        {{ Form::label('content','Content:') }}
        {{ Form::textarea('content',Input::old('content'),['rows'=>5]) }}
    </div>
</div>
@if($errors->has())
@foreach($errors->all() as $error)
<div data-alert class="alert-box warning round">
    {{$error}}
    <a href="#" class="close">&times;</a>
</div>
@endforeach
@endif
{{ Form::submit('Save',['class'=>'button tiny radius']) }}
{{ Form::close() }}
