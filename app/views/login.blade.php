<div class="small-6 large-6 column login-form">
        {{ Form::open(['action' => 'BlogController@postLogin']) }}
        <fieldset>
            <legend>Login</legend>
            {{ Form::label('username','Username') }}
            {{ Form::text('username',Input::old('username'),['placeholder'=>'Your nice name']) }}
            {{ Form::label('password','Password') }}
            {{ Form::password('password',['placeholder'=>'Password here']) }}
            {{ Form::submit('Login',['class'=>'button tiny radius']) }}
        </fieldset>
        {{ Form::close() }}
        @if($errors->has())
            @foreach ($errors->all() as $message)
                <span class="label alert round">{{$message}}</span><br><br>
            @endforeach
        @endif
        @if(Session::has('failure'))
            <span class="label alert round">{{Session::get('failure')}}</span>
        @endif
</div>

