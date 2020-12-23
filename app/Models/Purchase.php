<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\DefaultDatetimeFormat;

/**
 * @property int        $created_at
 * @property int        $ended_at
 * @property boolean    $sell_type
 * @property int        $started_at
 * @property int        $updated_at
 */
class Purchase extends Model
{
    use DefaultDatetimeFormat;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'purchases';

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
        'consumer_id', 'ended_at', 'house_id', 'price', 'sell_type', 'started_at'
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
         'sell_type' => 'boolean'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = true;

    // Scopes...

    // Functions ...
    public static $type = ["租售","出售"];

    // Relations ...

    public function house()
    {
        return $this->belongsTo('App\Models\House');
    }

    public function consumer()
    {
        return $this->belongsTo('App\Models\Consumer');
    }
}
