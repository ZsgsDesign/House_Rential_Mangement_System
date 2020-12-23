<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\DefaultDatetimeFormat;

/**
 * @property string     $first_name
 * @property string     $last_name
 * @property boolean    $gender
 * @property string     $email
 * @property string     $tel
 * @property string     $note
 * @property int        $created_at
 * @property int        $updated_at
 * @property int        $deleted_at
 */
class Consumer extends Model
{
    use DefaultDatetimeFormat;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'consumers';

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
        'first_name', 'last_name', 'gender', 'email', 'tel', 'note'
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
        'first_name' => 'string', 'last_name' => 'string', 'gender' => 'boolean', 'email' => 'string', 'tel' => 'string', 'note' => 'string'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = true;

    // Scopes...

    // Functions ...
    public static $gender = ["男","女"];

    public function getFullNameAttribute()
    {
        return $this->last_name.$this->first_name;
    }

    // Relations ...

    public function purchases()
    {
        return $this->hasMany('App\Models\Purchase');
    }
}
