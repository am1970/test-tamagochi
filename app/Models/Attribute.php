<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Attribute
 *
 * Properties
 * @property integer $id
 * @property string $name
 * @property string $title
 * @property string $description
 * @property Carbon $updated_at
 * @property Carbon $created_at
 */
class Attribute extends Model
{
    #region Properties

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'title', 'description'
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
        'name' => 'string',
        'title' => 'string',
        'description' => 'string'
    ];

    #endregion

    #region Methods

    #endregion

    #region Relationships
    #endregion
}
