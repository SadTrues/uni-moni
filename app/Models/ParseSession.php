<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ParseSessionItem;

class ParseSession extends Model
{

    protected $table = 'parse_sessions';

    protected $appends = [
        'items'
    ];

    protected $fillable = [
        'token',
        'items'
    ];

    protected $hidden = [

    ];

    /*
     * Relations
     */

    public function items()
    {
        return $this->hasMany('App\Models\ParseSessionItem');
    }

    /**
     * Scopes
     */

    public function scopeOfToken($query, $param)
    {
        return $query->whereToken($param);
    }

    public function scopeOfStatus($query, $param)
    {
        return $query->whereStatus($param);
    }

    /*
     * Accessors
     */

//    public function getItemsAttribute()
//    {
//        return $this->items()->lists('url');
//    }


    /*
     * Mutators
     */

    public function setItemsAttribute(array $items)
    {
        if ($this->exists) {
            foreach ($items as $item) {
                $current_item = new ParseSessionItem();
                $current_item->fill($item);
                $this->items()->save($current_item);
            }
        }
    }
}
