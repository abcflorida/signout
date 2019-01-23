<?php

namespace Flw\Signout\Models;

use Illuminate\Database\Eloquent\Model;
use App\User as User;

/**
 * @property int $checkout_log_id
 * @property int $checkout_id
 * @property string $checkout_time
 * @property string $checkin_time
 * @property string $location
 * @property string $user_id
 *
 * */
class CheckoutLog extends Model {

    protected $table = 'checkout_log';
    protected $primaryKey = 'checkout_log_id';
    protected $fillable = ['checkout_time', 'checkin_time','late','with_user_id','checkout_id','user_id','est_checkin_time'];
    protected $dates = ['checkout_time', 'checkin_time', 'updated_at', 'created_at'];

    public function user () {

        return $this->belongsTo( User::class, 'user_id', 'id' );

    }

    public function withUser () {
        return $this->belongsTo( User::class, 'with_user_id', 'id' );
    }


}