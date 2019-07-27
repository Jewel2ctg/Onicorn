<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Model\Backend\Division;
use App\Model\Backend\District;
use App\Model\Backend\Country;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name','username','country_id','division_id','district_id','street_address','slug', 'email', 'password','phone_no',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     public function district()
  {
    return $this->belongsTo(District::class,'district_id');
  }
public function division()
  {
    return $this->belongsTo(Division::class,'division_id');
  }
  public function country()
  {
    return $this->belongsTo(Country::class,'country_id');
  }

     
}
