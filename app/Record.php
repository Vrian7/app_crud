<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Record extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public $timestamps  = false;
    public $guarded     = ['id'];
    protected $fillable = [
        'uuid',
        'name',
        'description',
        'code',
        'status_id'
    ];
    
    /**
     * Get Record Status 
     * @access public
     * @return \App\Status
     */
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }    
}
