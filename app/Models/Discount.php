<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Discount
 *
 * @property $id
 * @property $name
 * @property $start_date
 * @property $end_date
 * @property $priority
 * @property $active
 * @property $region_id
 * @property $brand_id
 * @property $access_type_code
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property AccessType $accessType
 * @property Brand $brand
 * @property DiscountRange[] $discountRanges
 * @property Region $region
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Discount extends Model
{
    use SoftDeletes;

    static $rules = [
		'name' => 'required',
		'start_date' => 'required',
		'end_date' => 'required',
		'priority' => 'required',
		'active' => 'required',
		'region_id' => 'required',
		'brand_id' => 'required',
		'access_type_code' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','start_date','end_date','priority','active','region_id','brand_id','access_type_code'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function accessType()
    {
        return $this->hasOne('App\Models\AccessType', 'code', 'access_type_code');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function brand()
    {
        return $this->hasOne('App\Models\Brand', 'id', 'brand_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function discountRanges()
    {
        return $this->hasMany('App\Models\DiscountRange', 'discount_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function region()
    {
        return $this->hasOne('App\Models\Region', 'id', 'region_id');
    }
    

}
