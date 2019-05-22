<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Document extends Model
{
    public function order()
    {
        return $this->belongsTo('App\Order');
    }


    public static function boot ()
    {
        parent::boot();
    
        self::deleted(function ($document) {
            Storage::delete($document->path);
        });

    }
}
