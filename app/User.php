<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function companies() {
      return $this->belongsToMany('App\Company')->withPivot('accepted');
    }

    public function roles() {
      return $this->belongsToMany('App\Role');
    }

    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
          foreach ($roles as $role) {
            if ($this->hasRole($role)) {
              return true;
            }
          }
        } else {
          if ($this->hasRole($roles)) {
            return true;
          }
        }
        return false;
    }

    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
          return true;
        } else {
          return false;
        }
    }

    public function isOwner($company)
    {
      if ($this->isSuperAdmin()) {
        return true;
      } else {
        return (bool) $this->companies->where('id', $company->id)->count();
      }
    }

    public function isSuperAdmin()
    { return (bool) $this->roles->where('name', 'superadmin')->count(); }
}
