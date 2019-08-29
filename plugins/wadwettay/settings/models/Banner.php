<?php namespace Wadwettay\Settings\Models;

use Backend\Facades\BackendMenu;
use Model;
use System\Classes\SettingsManager;

/**
 * Banner Model
 */
class Banner extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    public $settingsCode = 'wadwettay_settings_banners';

    public $settingsFields = 'fields.yaml';
    /**
     * @var string The database table used by the model.
     */
    public $table = 'wadwettay_settings_banners';

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
        'banner_1' => ['System\Models\File'],
        'banner_2' => ['System\Models\File'],
        'banner_3' => ['System\Models\File'],
        'banner_4' => ['System\Models\File'],
        'banner_5' => ['System\Models\File'],
        'banner_6' => ['System\Models\File']
    ];
    public $attachMany = [];

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Wadwettay.Settings', 'settings', 'banners');
        SettingsManager::setContext('Wadwettay.Settings', 'banners');
    }
}
