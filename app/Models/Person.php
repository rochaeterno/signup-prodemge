<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Person extends Model
{
    use HasFactory;

    protected $table = "people";
    protected $fillable = [
        'name',
        'father_name',
        'mother_name',
        'social_name',
        'phone',
        'email',
        'cpf',
    ];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y h:i',
        'updated_at' => 'datetime:d/m/Y h:i',
    ];

    public function addresses(): BelongsToMany
    {
        return $this->belongsToMany(Address::class)->withPivot('_is_active');
    }
}
