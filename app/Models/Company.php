<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'email',
        'logo',
        'website',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'company_users',);
    }

    public function departments()
    {
        return $this->hasMany(Department::class);
    }

    public function designations()
    {
        return $this->throughDepartments()->hasDesignations();
    }

    public function getLogoAttribute(){
        return $this->logo ? asset('storage/'.$this->logo) : asset('images/default-logo.png');
    }
}
