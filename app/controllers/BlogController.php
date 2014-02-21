<?php

class BlogController extends BaseController
{


    public function __construct()
    {
        //updated: prevents re-login.
        $this->beforeFilter('guest', ['only' => ['getLogin']]);
        $this->beforeFilter('auth', ['only' => ['getLogout']]);
    }

    public function getIndex()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        $posts->getEnvironment()->setViewName('pagination::simple');
        $this->layout->title = 'Home Page | Laravel 4 Blog';
        $this->layout->main = View::make('home')->nest('content', 'index', compact('posts'));
    }

    public function getSearch()
    {
        $searchTerm = Input::get('s');
        $posts = Post::whereRaw('match(title,content) against(? in boolean mode)', [$searchTerm])
            ->paginate(10);
        $posts->getEnvironment()->setViewName('pagination::slider');
        $posts->appends(['s' => $searchTerm]);
        $this->layout->with('title', 'Search: ' . $searchTerm);
        $this->layout->main = View::make('home')
            ->nest('content', 'index', ($posts->isEmpty()) ? ['notFound' => true] : compact('posts'));
    }

    public function getLogin()
    {
        $this->layout->title = 'login';
        $this->layout->main = View::make('login');
    }

    public function postLogin()
    {
        $credentials = [
            'username' => Input::get('username'),
            'password' => Input::get('password')
        ];
        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];
        $validator = Validator::make($credentials, $rules);
        if ($validator->passes()) {
            if (Auth::attempt($credentials))
                return Redirect::to('admin/dash-board');
            return Redirect::back()->withInput()->with('failure', 'username or password is invalid!');
        } else {
            return Redirect::back()->withErrors($validator)->withInput();
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return Redirect::to('/');
    }

}
