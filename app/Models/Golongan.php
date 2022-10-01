<?php

namespace App\Models;

use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Golongan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'golongan';
    protected $guarded = [];
    protected $fillable = [
        'id',
        'nama_golongan',
    ];
    public $incrementing = false;

    public function pegawai() {
        return $this->hasMany(Pegawai::class);
    }
}
