<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Auth\Passwords\CanResetPassword as CanResetPasswordTrait;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class Account extends Authenticatable implements CanResetPassword
{
    use HasFactory, SoftDeletes, CanResetPasswordTrait, Notifiable;

    protected $table = 'accounts';

    protected $fillable = [
        'first_name',
        'last_name',
        'title',
        'email',
        'password',
        'phone',
        'bio',
        'country',
        'province',
        'city',
        'postal_code',
        'photo',
    ];

    protected $hidden = [
        'password',
    ];

        public function article(): HasMany
    {
        return $this->HasMany(Article::class, 'account_id', 'id');
    }
}