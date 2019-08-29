<?php namespace Wadwettay\Announcements\Models;

use Model;

/**
 * Announcement Model
 */
class Announcement extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'wadwettay_announcements_announcements';

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
