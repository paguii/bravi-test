<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable = ["name"];

    public function contact()
    {
        return $this->hasMany(Contact::class, "person_id", "id");
    }
}
