<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    protected $table = 'speaker';
    protected $fillable = ['name'];

    public function talks()
    {
        return $this->hasMany(Talks::class);
    }
}
