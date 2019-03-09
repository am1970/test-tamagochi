<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Animal
 *
 * Properties
 * @property integer $id
 * @property string $name
 * @property string $title
 * @property string $image_path
 * @property Carbon $updated_at
 * @property Carbon $created_at
 */
class Animal extends Model
{
    #region Properties

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'title', 'image_path'
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
        'image_path' => 'string'
    ];

    #endregion

    #region Methods

    #endregion

    #region Relationships

    #endregion
}
