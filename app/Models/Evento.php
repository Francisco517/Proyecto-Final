<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evento extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['nombre','user_id','correo','telefono','pedidos'];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function personas()
    {
        return $this->belongsToMany(persona::class);
    }

    public function archivos()
    {
        return $this->hasMany(Archivos::class);
    }
}
