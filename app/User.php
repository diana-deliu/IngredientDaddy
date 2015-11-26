<?php namespace App;

use Codesleeve\Stapler\ORM\EloquentTrait;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
		AuthorizableContract,
		CanResetPasswordContract,
		StaplerableInterface
{
	use Authenticatable, Authorizable, CanResetPassword, EloquentTrait;

    public function __construct(array $attributes = array()) {
        $this->hasAttachedFile('avatar', [
            'styles' => [
                'medium' => '300x300',
                'small' => '105x105',
                'thumb' => '50x50'
            ]
        ]);

        parent::__construct($attributes);
    }

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password', 'confirmation_code', 'region_id', 'is_region_unreliable'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token', 'confirmation_code', 'confirmed'];

    /**
     * A user belongs to a region.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function region() {
        return $this->belongsTo('App\Region');
    }

}
