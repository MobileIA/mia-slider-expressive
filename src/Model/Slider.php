<?php namespace Mobileia\Slider\Model;

/**
 * Description of CacheInter
 *
 * @author matiascamiletti
 */
class Slider extends \Illuminate\Database\Eloquent\Model
{
    const STATUS_PENDING = 0;
    const STATUS_ACTIVE = 1;
    
    protected $table = 'slider';
    
    //protected $casts = ['data_extra' => 'array'];
    
    //public $timestamps = false;
}