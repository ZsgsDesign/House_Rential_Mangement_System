<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\DefaultDatetimeFormat;

/**
 * @property int        $balconines
 * @property int        $bathrooms
 * @property int        $bedrooms
 * @property string     $building
 * @property int        $created_at
 * @property string     $floor
 * @property int        $livingrooms
 * @property boolean    $method
 * @property string     $note
 * @property boolean    $status
 * @property int        $updated_at
 */
class House extends Model
{
    use DefaultDatetimeFormat;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'houses';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'balconines', 'bathrooms', 'bedrooms', 'building', 'floor', 'livingrooms', 'method', 'note', 'property_id', 'rent_price', 'sell_price', 'square_meter', 'status'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'balconines' => 'int', 'bathrooms' => 'int', 'bedrooms' => 'int', 'building' => 'string', 'floor' => 'string', 'livingrooms' => 'int', 'method' => 'boolean', 'note' => 'string', 'status' => 'boolean'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = true;

    // Scopes...

    // Functions ...

    // Relations ...

    public function property()
    {
        return $this->belongsTo('App\Models\Property');
    }
}
