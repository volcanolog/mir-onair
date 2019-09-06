<?php namespace Wadwettay\Trinsling\Models;

use Model;

/**
 * Stream Model
 */
class Stream extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'wadwettay_trinsling_streams';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [
        'icon' => ['System\Models\File'],
        'poster' => ['System\Models\File']
    ];
    public $attachMany = [];
}
