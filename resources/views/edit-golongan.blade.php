@extends('layouts.main')

@section('content')
<div class="mx-auto mt-10">
  <div class="text-3xl w-2/3 text-ebony-clay-900 font-main mb-10 font-bold">Tambah Data Pegawai</div>
  <form action="/update-golongan/{{ $golongan->id }}" class="w-full" method="POST">
    @csrf
    <div class="mb-6">
      <label for="id" class="block mb-2 text-base font-main font-medium text-gray-800">Kode Golongan</label>
      <input type="text" id="id" value="{{ $golongan->id }}" name="id" class="input-area" required>
    </div>
    <div class="mb-6">
      <label for="nama_golongan" class="block mb-2 text-base font-main font-medium text-gray-800">Nama Golongan</label>
      <input type="text" id="nama_golongan" value="{{ $golongan->nama_golongan }}" name="nama_golongan" class="input-area">
    </div>
    <div class="flex justify-center mb-10">
    <button type="submit" class="text-gray-900 font-main bg-white hover:bg-ebony-clay-500 font-extrabold focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-3xl text-base w-full sm:w-auto px-14 py-3 text-center mt-5">Submit</button>
    </div>
  </form>
</div>
@endsection