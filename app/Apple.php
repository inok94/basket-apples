<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apple extends Model
{
    /**
     * The connection name for the model
     *
     * @var  string
     */
    protected $table = 'apples';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(
            User::class,
            'storages',
            'apple_id',
            'user_id'
        )
            ->withTimestamps();
    }
}
