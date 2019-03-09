<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserAnimalAttribute
 *
 * Properties
 * @property integer $id
 * @property integer $user_animal_id
 * @property integer $attribute_id
 * @property integer $value
 * @property Carbon $updated_at
 * @property Carbon $created_at
 *
 * Relationships
 * @property UserAnimal $userAnimal
 * @property Attribute $attribute
 */
class UserAnimalAttribute extends Model
{
    #region Properties

    /**
     * @var array
     */
    protected $fillable = [
        'user_animal_id', 'attribute_id', 'value'
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
        'user_animal_id' => 'integer',
        'attribute_id' => 'integer',
        'value' => 'integer'
    ];

    #endregion

    #region Methods

    #endregion

    #region Relationships

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userAnimal()
    {
        return $this->belongsTo(UserAnimal::class);
    }

    #endregion
}
