<?php

namespace Flw\Signout\Models;

//use Illuminate\Database\Eloquent\Model;
use Flw\Signout\Models\Signout;
use Backpack\CRUD\CrudTrait;

//use Illuminate\Database\Eloquent\Relations\MorphToMany;

/**
 * @property int $location_id
 * @property string $name
 */
class Location extends FlwModel {

    use CrudTrait;

    protected $table = 'location';
    protected $primaryKey = 'location_id';
    protected $errors;

    protected $fillable = ['name','location_id','location_description','address1','city','state','zip','country','active','needs_buddy','location_type_id','lat','long'];

    protected $rules = array(
        'location_id' => 'required|integer',
        'location_description' => 'string',
        'address1' => 'string',
        'city' => 'string',
        'state' => 'string',
        'zip' => 'string',
        'country' => 'string',
        'active' => 'integer',
        'needs_buddy' => 'integer'
    );

    public function signOutLocations () {
        return $this->belongsToMany(Signout::class, 'checkout_location', 'checkout_id','checkout_id' );
    }

    public function locationType () {
        return $this->belongsTo( LocationType::class, 'location_type_id', 'id');
    }



}