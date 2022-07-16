<?php

namespace App\Models;

use App\Enums\FormStatusEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin \Illuminate\Database\Eloquent\Builder
 *
 * @method static \Illuminate\Database\Eloquent\Builder|static query()
 * @method static static make(array $attributes = [])
 * @method static static create(array $attributes = [])
 * @method static static forceCreate(array $attributes)
 * @method \App\Models\Form firstOrNew(array $attributes = [], array $values = [])
 * @method \App\Models\Form firstOrFail($columns = ['*'])
 * @method \App\Models\Form firstOrCreate(array $attributes, array $values = [])
 * @method \App\Models\Form firstOr($columns = ['*'], \Closure $callback = null)
 * @method \App\Models\Form firstWhere($column, $operator = null, $value = null, $boolean = 'and')
 * @method \App\Models\Form updateOrCreate(array $attributes, array $values = [])
 * @method null|static first($columns = ['*'])
 * @method static static findOrFail($id, $columns = ['*'])
 * @method static static findOrNew($id, $columns = ['*'])
 * @method static null|static find($id, $columns = ['*'])
 *
 * @mixin Builder
 * @property-read int $id
 * @property int user_id
 * @property string theme
 * @property string message
 * @property string file_path
 * @property FormStatusEnum status
 * @property-read  Carbon created_at
 * @property-read  Carbon updated_at
 */
class Form extends Model
{
    protected $guarded = [];

    protected $casts = [
        'status' => FormStatusEnum::class,
    ];

    public function scopeUserForms($query)
    {
        return $query->where('user_id', auth()->user()->id);
    }

    public function user()
    {
        return $this->belongsTo(User::class,);
    }
}
