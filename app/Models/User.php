<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    function address() {
        /**
         * no need to specify the foreign key column because
         * we followed the correct model_pk naming convention
         */
        // return $this->hasOne(Address::class);

        /**
         * if we did not follow the correct naming convention 
         * then we need to specify the foreignkey and the localkey
         * 
         * user_id is coming from the address table
         * id is the local key coming from the users model
         */
        return $this->hasOne(Address::class, 'user_id', 'id');
    }

    function addresses() {
        return $this->hasMany(Address::class);
    }

    function posts(){
        return $this->hasMany(Post::class);
    }

    function image(){
        return $this->morphOne(Image::class,'imageable');
    }

}
