<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\DefaultDatetimeFormat;

/**
 * @property string     $address
 * @property int        $created_at
 * @property string     $name
 * @property int        $updated_at
 */
class Property extends Model
{
    use DefaultDatetimeFormat;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'properties';

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
        'address', 'area_id', 'lat', 'lng', 'name'
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
        'address' => 'string', 'name' => 'string'
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

    public function houses()
    {
        return $this->hasMany('App\Models\House');
    }

    public function area()
    {
        return $this->belongsTo('App\Models\Area');
    }
}
