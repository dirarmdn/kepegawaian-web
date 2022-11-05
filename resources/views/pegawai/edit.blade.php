@extends('layouts.main')

@section('content')
<div class="mx-auto mt-10">
  <div class="text-3xl w-2/3 text-ebony-clay-900 font-main mb-10 font-bold">Update Data Pegawai</div>
  <form action="/update-pegawai/{{ $pegawai->id }}" class="w-full" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="flex flex-row gap-4">
      <div class="mb-6">
        <label for="nip" class="block mb-2 text-base font-main font-medium text-gray-800">NIP</label>
        <input type="number" id="nip" value="{{ $pegawai->nip }}" class="input-area" name="nip">
      </div>
      <div class="mb-6">
        <label for="nik" class="block mb-2 ml-5 text-base font-main font-medium text-gray-800">NIK</label>
        <input type="number" id="nik" class="input-area" name="nik" value="{{ $pegawai->nik }}">
      </div>
    </div>
    <div class="mb-6">
      <label for="nama" class="block mb-2 text-base font-main font-medium text-gray-800">Nama</label>
      <input type="text" id="nama" class="input-area" name="nama" value="{{ $pegawai->nama }}">
    </div>
    <div class="mb-6">
      <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-gray-800">Jenis Kelamin</label>
      <select id="jenis_kelamin" name="jenis_kelamin" value="{{ $pegawai->jenis_kelamin }}" class="input-area">
        <option value="pria" {{ ( $pegawai->jenis_kelamin === 'pria') ? 'selected' : '' }}>Pria</option>
        <option value="wanita" {{ ( $pegawai->jenis_kelamin === 'wanita') ? 'selected' : '' }}>Wanita</option>
      </select>      
    </div>
    <div class="mb-6">
      <label for="tempat_lahir" class="block mb-2 text-base font-main font-medium text-gray-800">Tempat Lahir</label>
      <input type="text" id="tempat_lahir" name="tempat_lahir" value="{{ $pegawai->tempat_lahir }}" class="input-area">
    </div>
    <div class="flex flex-row gap-4">
      <div class="mb-6 w-full">
        <label for="tanggal_lahir" class="block mb-2 text-base font-main font-medium text-gray-800">Tanggal Lahir</label>
        <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ $pegawai->tanggal_lahir }}" class="input-area">
      </div>
      <div class="mb-6 w-full">
        <label for="telpon" class="block mb-2 text-base font-main font-medium text-gray-800">Nomor Telepon</label>
        <input type="number" id="telpon" name="telpon" class="input-area" value="{{ $pegawai->telpon }}">
      </div>
    </div>

    <div class="mb-6">
      <label for="agama" class="block mb-2 text-base font-main font-medium text-gray-800">Agama</label>
      <input type="text" id="agama" class="input-area" name="agama" value="{{ $pegawai->agama }}">
    </div>
    <div class="mb-6">
      <label for="status" class="block mb-2 text-base font-main font-medium text-gray-800">Status Pernikahan</label>
      <select id="status" name="status_nikah" class="input-area" value="{{ $pegawai->status_nikah }}">
        <option value="belum nikah" {{ ( $pegawai->status_nikah === 'belum nikah') ? 'selected' : '' }}>Belum Menikah</option>
        <option value="nikah" {{ ( $pegawai->status_nikah === 'nikah') ? 'selected' : '' }}>Menikah</option>
      </select>
      {{-- <select name="role" class="input-area">
        <option>Pilih</option>
        @foreach ($pegawai as $p)
        <option name="role" value="{{$role->role_id}}">{{$role->name}}</option>
        @endforeach
      </select>  --}}
    </div>
    <div class="mb-6">
      <label for="alamat" class="block mb-2 text-base font-main font-medium text-gray-800">Alamat</label>
      <input id="alamat" name="alamat" class="input-area" value="{{ $pegawai->alamat }}">
    </div>
    <div class="mb-6">
      <label for="id" class="block mb-2 text-base font-main font-medium text-gray-800">Golongan</label>
      <select id="id" name="id_golongan" class="input-area" value="{{ $pegawai->id_golongan }}">
        @foreach ( $golongan as $g)
          <option value="{{ $g->id }}">{{ $g->nama_golongan }}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-6">
      <label class="block mb-2 text-base font-main font-medium text-gray-900" for="file_input">Foto</label>
      <input class="input-area cursor-pointer focus:outline-none" id="file_input" type="file" value="{{ $pegawai->foto }}">      
    </div>
    <div class="flex justify-center">
    <button type="submit" class="text-gray-900 font-main bg-white hover:bg-ebony-clay-500 font-extrabold focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-3xl text-base w-full sm:w-auto px-14 py-3 text-center my-5 shadow-xl">Submit</button>
    </div>
  </form>
</div>
@endsection