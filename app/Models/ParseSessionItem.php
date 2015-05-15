<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ParseSession;

class ParseSessionItem extends Model
{

    protected $table = 'parse_sessions_items';

    protected $appends = [];

    protected $fillable = [
        'parse_sessions_id',
        'url',
        'html',
        'status'
    ];

    protected $hidden = [

    ];

    /*
     * Relations
     */

    public function session()
    {
        return $this->hasOne('App\Models\ParseSession');
    }

    /*
     * Accessors
     */

    public function getItemsAttribute()
    {

    }


    /*
     * Mutators
     */

    public function setItemsAttribute()
    {

    }
}
