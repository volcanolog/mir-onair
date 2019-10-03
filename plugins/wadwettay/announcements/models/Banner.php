<?php namespace Wadwettay\Announcements\Models;

use Model;

/**
 * Banner Model
 */
class Banner extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    public $settingsCode = 'wadwettay_banners_settings';

    public $settingsFields = 'fields.yaml';

    /**
     * @var string The database table used by the model.
     */
    public $table = 'wadwettay_announcements_banners';

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
    public $attachOne = [];
    public $attachMany = [];
}
