@extends('layouts.main')

@section('content')
<div class="mx-auto my-24">
  <div class="text-3xl text-ebony-clay-900 font-main mb-10 font-bold">Tambah Data Kepegawaian</div>
  <form action="/add-pegawai" class="w-full" method="POST" enctype="multipart/form-data">
    @csrf
      <div class="mb-6">
        <label for="nip" class="block mb-2 text-base font-main font-medium text-gray-800">NIP</label>
        <input type="number" id="nip" class="input-area" name="nip" required>
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
      <label for="id" class="block mb-2 text-base font-main font-medium text-gray-800">Golongan</label>
      <select id="id" name="id_golongan" class="input-area">
        @foreach ( $golongan as $g)
          <option value="{{ $g->id }}">{{ $g->nama_golongan }}</option>
        @endforeach
      </select>
    </div>
    <div class="flex justify-center mb-5">
    <button type="submit" class="text-gray-900 font-main bg-white hover:bg-[#b2fefe] font-extrabold focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-3xl text-base w-full sm:w-auto px-14 py-3 text-center mt-5">Submit</button>
    </div>
  </form>
</div>
@endsection