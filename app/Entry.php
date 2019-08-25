<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $fillable = ['handle', 'user_id', 'reason'];

    public function violations()
    {
        return $this->hasMany(Violation::class);
    }
}
