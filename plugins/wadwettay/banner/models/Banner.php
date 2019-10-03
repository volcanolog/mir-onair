<?php namespace Wadwettay\Banner\Models;

use Model;

/**
 * Banner Model
 */
class Banner extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'wadwettay_banner_banners';

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
        'image' => ['System\Models\File'],
    ];
    public $attachMany = [];
}
