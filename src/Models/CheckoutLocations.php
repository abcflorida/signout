<?php

namespace Flw\Signout\Models;

use Flw\Signout\Models\Signout;
//use Illuminate\Database\Eloquent\Model;

/**
* @property int $checkout_id
* @property int $location_id
* @property int $user_id
* @property string $description
* @property string $created_at
* @property string $updated_at
 * */
class CheckoutLocations extends FlwModel {

    protected $table = 'checkout_location';
    protected $primaryKey = 'checkout_location_id';

    protected $fillable = ['checkout_id','location_id','user_id','description'];

    public function signOut () {

        return $this->belongsTo( Signout::class, 'location_id', 'location_id' );

    }


}