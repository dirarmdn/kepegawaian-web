<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'karyawan';
    protected $guarded = [];
    protected $fillable = [
        'nip',
        'nik',
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'telpon',
        'agama',
        'status_nikah',
        'alamat',
        'foto',
        'id_golongan',
    ];
    protected $primaryKey = 'id';
}
