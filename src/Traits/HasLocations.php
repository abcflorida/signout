<?php
namespace Flw\Signout\Traits;

//use Illuminate\Database\Eloquent\Relations\MorphToMany;

trait HasLocations {

    /**
     * A signout may have multiple locations.
     */
    /**  public function locations()
    {
        return $this->hasMany( config('signout.signout.locations'), 'location_id','location_id');
        return $this->morphToMany(
            config('signout.signout.location'),
            'signout',
            config('signout.table_name.signout_has_locations'),
            config('signout.column_names.signout_morph_key'),
            'location_id'
        );
    } **/



}