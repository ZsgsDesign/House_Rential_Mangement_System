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
 * @property int        $method
 * @property string     $note
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
        'balconines', 'bathrooms', 'bedrooms', 'building', 'floor', 'livingrooms', 'method', 'note', 'property_id', 'rent_price', 'sell_price', 'square_meter'
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
        'balconines' => 'int', 'bathrooms' => 'int', 'bedrooms' => 'int', 'building' => 'string', 'floor' => 'string', 'livingrooms' => 'int', 'method' => 'int', 'note' => 'string'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = true;

    // Scopes...

    // Functions ...

    public static $method = ["租售","出售","租售/出售"];

    public function getPropertyLatAttribute()
    {
        return $this->property->lat;
    }

    public function getPropertyLngAttribute()
    {
        return $this->property->lng;
    }

    public function getReadableNameAttribute()
    {
        return $this->property->readable_name.' '.$this->building.' '.$this->floor;
    }

    public function getParsedStatusAttribute()
    {
        $status = ["正常","已成交","异常"];
        return $status[$this->parse_status()];
    }

    protected function parse_status()
    {
        if($this->purchases->count()==0) {
            return 0;
        }
        foreach($this->purchases as $purchase) {
            if($purchase->sell_type==1) {
                return 1;
            }
            if(time() < strtotime($purchase->ended_at)){
                return 1;
            }
        }
        return 0;
    }

    // Relations ...

    public function property()
    {
        return $this->belongsTo('App\Models\Property');
    }

    public function purchases()
    {
        return $this->hasMany('App\Models\Purchase');
    }

    public static function purchasable()
    {
        $collection = self::all();
        $filtered = $collection->filter(function ($house, $key) {
            return $house->parsed_status=="正常";
        });
        return $filtered;
    }
}
