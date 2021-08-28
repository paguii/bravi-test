<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ["contact_type_id", "number", "email"];

    public function person()
    {
        return $this->belongsTo(Person::class, "person_id");
    }
}
