<?php

namespace App\Models;

use App\Models\Golongan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pegawai extends Model
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
