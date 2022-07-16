<?php

namespace App\Models;

use App\Enums\FormStatusEnum;
use App\Enums\RoleEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @mixin \Illuminate\Database\Eloquent\Builder
 *
 * @method static \Illuminate\Database\Eloquent\Builder|static query()
 * @method static static make(array $attributes = [])
 * @method static static create(array $attributes = [])
 * @method static static forceCreate(array $attributes)
 * @method \App\Models\User firstOrNew(array $attributes = [], array $values = [])
 * @method \App\Models\User firstOrFail($columns = ['*'])
 * @method \App\Models\User firstOrCreate(array $attributes, array $values = [])
 * @method \App\Models\User firstOr($columns = ['*'], \Closure $callback = null)
 * @method \App\Models\User firstWhere($column, $operator = null, $value = null, $boolean = 'and')
 * @method \App\Models\User updateOrCreate(array $attributes, array $values = [])
 * @method null|static first($columns = ['*'])
 * @method static static findOrFail($id, $columns = ['*'])
 * @method static static findOrNew($id, $columns = ['*'])
 * @method static null|static find($id, $columns = ['*'])
 *
 * @mixin Builder
 * @property-read int $id
 * @property string name
 * @property string email
 * @property RoleEnum role
 * @property-read  Carbon email_verified_at
 * @property-read  string password
 * @property-read  Carbon created_at
 * @property-read  Carbon updated_at
 */

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'role',
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
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'role' => RoleEnum::class,
    ];

    public function forms()
    {
        return $this->hasMany(Form::class);
    }
}
