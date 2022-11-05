@extends('layouts.main')

@section('content')
<div class="m-10 mx-auto">
  <div class="bg-white rounded-lg shadow-xl p-10 flex flex-row">
    <div class="text-3xl w-1/3 text-ebony-clay-900 font-main mb-10 font-extrabold">Detail Golongan</div>
    <div class="flex flex-row gap-10 w-2/3">
      <img src="" class="" alt="">
      <ul class="flex flex-col gap-4">
        <li>
          <div class="font-main font-bold text-2xl text-ebony-clay-900">{{ $golongan->nama_golongan }}</div>
        </li>
          <li>
            <div class="font-main font-bold text-xl text-ebony-clay-900">Kode Golongan: <span class="font-serif">{{ $golongan->id }}</span></div>
          </li>
      </ul>
    </div>
  </div>
</div>
@endsection