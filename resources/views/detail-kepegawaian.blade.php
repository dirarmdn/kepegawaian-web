@extends('layouts.main')

@section('content')
<div class="m-10 mx-auto">
  <div class="bg-white rounded-lg shadow-xl p-10 flex flex-row">
    <div class="text-3xl w-1/3 text-ebony-clay-900 font-main mb-10 font-extrabold">Detail Kepegawaian</div>
    <div class="flex flex-col gap-10 w-2/3">
      {{-- <img src="{{ url('public/images/php9364.tmp') }}" class="h-full w-full" alt=""> --}}
      <ul class="flex flex-col gap-4">
          <li>
            <div class="font-main font-bold text-xl text-ebony-clay-900">NIP: {{ $pegawai->nip }}</div>
          </li>
          <li>
            <div class="font-main font-bold text-xl text-ebony-clay-900">NIK: {{ $pegawai->nik }}</div>
          </li>
          <li>
            <div class="font-main font-bold text-xl text-ebony-clay-900">Nama: {{ $pegawai->nama }}</div>
          </li>
          <li>
            <div class="font-main font-bold text-xl text-ebony-clay-900">Jenis Kelamin: {{ $pegawai->jenis_kelamin }}</div>
          </li>
          <li>
            <div class="font-main font-bold text-xl text-ebony-clay-900">Tempat Lahir: {{ $pegawai->tempat_lahir }}</div>
          </li>
          <li>
            <div class="font-main font-bold text-xl text-ebony-clay-900">Tanggal Lahir: {{ $pegawai->tanggal_lahir }}</div>
          </li>
          <li>
            <div class="font-main font-bold text-xl text-ebony-clay-900">Nomor Telepon: {{ $pegawai->telpon }}</div>
          </li>
          <li>
            <div class="font-main font-bold text-xl text-ebony-clay-900">Agama: {{ $pegawai->agama }}</div>
          </li>
          <li>
            <div class="font-main font-bold text-xl text-ebony-clay-900">Status: {{ $pegawai->status_nikah }}</div>
          </li>
          <li>
            <div class="font-main font-bold text-xl text-ebony-clay-900">Alamat: {{ $pegawai->alamat }}</div>
          </li>
          <li>
            <div class="font-main font-bold text-xl text-ebony-clay-900">Golongan: {{ $pegawai->id_golongan }}</div>
          </li>
      </ul>
    </div>
  </div>
</div>
@endsection