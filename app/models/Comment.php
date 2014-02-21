<?php

class Comment extends Eloquent
{

    protected $fillable = ['commenter', 'email', 'comment'];

    public function post()
    {
        return $this->belongsTo('Post');
    }

    public function getApprovedAttribute($approved)
    {
        return (intval($approved) == 1) ? 'yes' : 'no';
    }

    public function setApprovedAttribute($approved)
    {
        $this->attributes['approved'] = ($approved === 'yes') ? 1 : 0;
    }

}
