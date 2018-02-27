<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * @package App
 */
class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return mixed
     */
    public static function getTableName()
    {
        return with(new static)->getTable();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function storages()
    {
        return $this->hasMany(Storage::class);
    }

    /**
     * @return
     */
    public function getApplesCount()
    {
        return count($this->storages);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function apples()
    {
        return $this->belongsToMany(
            Apple::class,
            'storages',
            'user_id',
            'apple_id'
        )
            ->withTimestamps();
    }
}

