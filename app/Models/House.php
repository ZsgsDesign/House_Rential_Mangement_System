<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

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
 * @property string     $rent_price
 * @property string     $sell_price
 * @property string     $square_meter
 * @property boolean    $status
 * @property int        $updated_at
 */
class House extends Model
{
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
        'balconines', 'bathrooms', 'bedrooms', 'building', 'created_at', 'floor', 'lat', 'livingrooms', 'lng', 'method', 'note', 'property_id', 'rent_price', 'sell_price', 'square_meter', 'status', 'updated_at'
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
        'balconines' => 'int', 'bathrooms' => 'int', 'bedrooms' => 'int', 'building' => 'string', 'created_at' => 'timestamp', 'floor' => 'string', 'livingrooms' => 'int', 'method' => 'boolean', 'note' => 'string', 'rent_price' => 'string', 'sell_price' => 'string', 'square_meter' => 'string', 'status' => 'boolean', 'updated_at' => 'timestamp'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = false;

    // Scopes...

    // Functions ...

    // Relations ...

    public function property()
    {
        return $this->belongsTo('App\Models\Property');
    }
}
