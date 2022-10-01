@extends('layouts.main')

@section('content')
<div class="mx-auto mt-10">
  <div class="text-3xl w-2/3 text-ebony-clay-900 font-main mb-10 font-bold">Tambah Data Pegawai</div>
  <form action="/add-pegawai" class="w-full" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="flex flex-row gap-4">
      <div class="mb-6">
        <label for="nip" class="block mb-2 text-base font-main font-medium text-gray-800">NIP</label>
        <input type="number" id="nip" class="input-area" name="nip" required>
      </div>
      <div class="mb-6">
        <label for="nik" class="block mb-2 ml-5 text-base font-main font-medium text-gray-800">NIK</label>
        <input type="number" id="nik" class="input-area" name="nik" required>
      </div>
    </div>
    <div class="mb-6">
      <label for="nama" class="block mb-2 text-base font-main font-medium text-gray-800">Nama</label>
      <input type="text" id="nama" class="input-area" name="nama" required>
    </div>
    <div class="mb-6">
      <label for="jenis_kelamin" class="block mb-2 text-base font-main font-medium text-gray-800">Jenis Kelamin</label>
      <select id="jenis_kelamin" name="jenis_kelamin" class="input-area">
        <option value="pria">Pria</option>
        <option value="wanita">Wanita</option>
      </select> 
    </div>
    <div class="mb-6">
      <label for="tempat_lahir" class="block mb-2 text-base font-main font-medium text-gray-800">Tempat Lahir</label>
      <input type="text" id="tempat_lahir" name="tempat_lahir" class="input-area">
    </div>
    <div class="flex flex-row gap-4">
      <div class="mb-6 w-full">
        <label for="tanggal_lahir" class="block mb-2 text-base font-main font-medium text-gray-800">Tanggal Lahir</label>
        <input type="date" id="tanggal_lahir" class="input-area" name="tanggal_lahir">
      </div>
      <div class="mb-6 w-full">
        <label for="telpon" class="block mb-2 text-base font-main font-medium text-gray-800">Nomor Telepon</label>
        <input type="number" id="telpon" name="telpon" class="input-area">
      </div>
    </div>

    <div class="mb-6">
      <label for="agama" class="block mb-2 text-base font-main font-medium text-gray-800">Agama</label>
      <input type="text" id="agama" class="input-area" name="agama">
    </div>
    <div class="mb-6">
      <label for="status" class="block mb-2 text-base font-main font-medium text-gray-800">Status Pernikahan</label>
      <select id="status" name="status_nikah" class="input-area">
        <option selected>Pilih:</option>
        <option value="belum nikah">Belum Menikah</option>
        <option value="nikah">Menikah</option>
      </select> 
    </div>
    <div class="mb-6">
      <label for="alamat" class="block mb-2 text-base font-main font-medium text-gray-800">Alamat</label>
      <input id="alamat" name="alamat" class="input-area">
    </div>
    <div class="mb-6">
      <label for="id" class="block mb-2 text-base font-main font-medium text-gray-800">Golongan</label>
      <select id="id" name="id_golongan" class="input-area">
        @foreach ( $golongan as $g)
          <option value="{{ $g->id }}">{{ $g->id }}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-6">
      <label class="block mb-2 text-base font-main font-medium text-gray-900" for="file_input">Foto</label>
      <input class="input-area cursor-pointer focus:outline-none" id="file_input" name="foto" type="file">      
    </div>
    <div class="flex justify-center mb-5">
    <button type="submit" class="text-gray-900 font-main bg-white hover:bg-ebony-clay-500 font-extrabold focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-3xl text-base w-full sm:w-auto px-14 py-3 text-center mt-5">Submit</button>
    </div>
  </form>
</div>
@endsection