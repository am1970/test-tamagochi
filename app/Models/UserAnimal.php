<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserAnimal
 *
 * Properties
 * @property integer $id
 * @property integer $animal_id
 * @property integer $user_id
 * @property string $name
 * @property Carbon $updated_at
 * @property Carbon $created_at
 *
 * Relationships
 * @property User $user
 * @property Animal $animal
 */
class UserAnimal extends Model
{
    #region Properties

    /**
     * @var array
     */
    protected $fillable = [
        'animal_id', 'user_id', 'name'
    ];

    /**
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at'
    ];

    /**
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'animal_id' => 'integer',
        'user_id' => 'integer',
        'name' => 'string'
    ];

    #endregion

    #region Methods

    #endregion

    #region Relationships

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }

    #endregion
}
