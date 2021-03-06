<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'reads'];

    public function scopeTrending($query, $take = 3)
    {
        return $query->orderBy('reads', 'desc')->take($take)->get();
    }

    public function edit(array $data)
    {
        $this->update($data);
        
        return $this;
    }
    
    public function erase()
    {
        $this->delete();
    }
}
