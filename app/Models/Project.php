<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'date', 'name', 'type_id'];

    protected $rules = [
        'name' => 'required|string|max:255',
        'type_id' => 'nullable|exists:types,id'
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
