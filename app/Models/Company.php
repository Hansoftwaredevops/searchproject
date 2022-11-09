<?php

namespace App\Models;

use Mockery\Matcher\Type;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'address', 'email', 'website'];

    public function contact()
    {
        return $this->hasMany(Contact::class);
    }
}
