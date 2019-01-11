<?php

namespace Flw\Signout\Models;

//use Illuminate\Database\Eloquent\Model;
use Flw\Signout\Models\CheckoutLocations as CheckoutLocations;
use Flw\Signout\Models\Signout as Checkout;
use App\User as User;

use Flw\Signout\Traits\HasLocations;

/**
 * Class News
 * @property int $checkout_id
 * @property int $user_id
 * @property string $checkout_time
 * @property string $created_at
 * @property string $updated_at
 * @mixin \Eloquent
 * @package App
 */
class Signout extends FlwModel {

    use HasLocations;

    protected $table = 'checkout';
    protected $primaryKey = 'checkout_id';
    protected $errors;

    protected $fillable = ['user_id','checkout_time','with_user_id','est_checkin_time','status'];

    protected $rules = array(
        'user_id' => 'required|integer|max:1000000|min:1',
        'checkout_time' => 'required|date'
    );

    protected $messages = array(
        'user_id.required' => 'User was not found',
        'checkout_time.required' => 'Checkout time required',
        'checkout_time.date' => 'This does not appear to be a good date'
    );

    public function user () {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function locations( ) {
        return $this->hasManyThrough( Location::class, CheckoutLocations::class, 'checkout_id', 'location_id', 'checkout_id','location_id' )->select('checkout_location.description','location.name','location.location_description','location_type_id','address1','city','state','zip','country','active','needs_buddy','checkout_id');
    }


}