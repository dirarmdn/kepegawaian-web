@extends('layouts.main')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" integrity="sha512-oe8OpYjBaDWPt2VmSFR+qYOdnTjeV9QPLJUeqZyprDEQvQLJ9C5PCFclxwNuvb/GQgQngdCXzKSFltuHD3eCxA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@section('content')

<div class="m-10 mx-auto">
  <div class="text-3xl text-ebony-clay-900 font-main mb-8 font-bold">Data Golongan</div>

  {{-- <div class="relative float-right text-gray-600 mr-14 mb-8">
    <input class="bg-gray-100 h-8 px-5 pr-16 rounded-lg text-sm focus:outline-sims focus:bg-white"
      type="search" name="search">
    <button type="submit" class="absolute right-0 top-0 mt-1 mr-4">
      <i class="fa-solid fa-magnifying-glass h-4 w-4 fill-current text-ebony-clay-800"></i>
    </button>
  </div> --}}
  <a href="/tambah-golongan" class="hover:text-ebony-clay-900 shadow-lg text-ebony-clay-900 py-2 px-3 w-36 bg-[#b2fefe] rounded-lg font-extrabold font-main">+ Tambah Data</a>
  <div class="overflow-hidden w-full relative mx-auto mt-8">
    <table class="mb-3 text-sm text-center w-full mx-auto" id="example">
        <thead class="text-md bg-gray-100 text-basic border font-pop">
                <th scope="col" class="py-3 px-16 border-r">No</th>
                <th scope="col" class="py-3 border-r">Kode Golongan</th>
                <th scope="col" class="py-3 border-r">Nama Golongan</th>
                <th scope="col" class="py-3 px-16">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-base">

          @forelse ($golongan as $key => $g)
            <tr class="bg-white border">
                <td class="py-3 px-16 border">{{ $key + 1 }}</td>
                <td class="py-3 px-16 border">{{ $g->id }}</td>
                <td class="py-3 px-12 border">{{ $g->nama_golongan }}</td>
                <td class="gap-2 flex justify-center items-center p-3">
                    <a href="/edit-golongan/{{ $g->id }}" class="text-white bg-sky-300 rounded-lg text-sm py-3 px-3">
                      <i class="fa-solid fa-pen"></i>
                    </a>
                    <a href="#" data-id="{{ $g->id }}" class="text-white delete bg-red-500 rounded-lg text-sm py-3 px-3 ">
                      <i class="fa-solid fa-trash"></i>                   
                    </a>
                    <a href="/show-golongan/{{ $g->id }}" class="text-white bg-gray-500 hover:bg-gray-600 hover:text-white rounded-lg text-sm py-3 px-3">
                      <i class="fa-solid fa-eye"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://kit.fontawesome.com/f13fa7e0b3.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  $('.delete').click(function(){
    var id = $(this).attr('data-id');
    swal({
      title: "Yakin??",
      text: "Kamu akan menghapus data ini",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "/delete-golongan/"+id+""
        swal("BAM! Data berhasil dihapus:(", {
          icon: "success",
        });
      } else {
        swal("Data tidak jadi dihapus");
      }
    });
  });
  </script>
  <script>
          $(document).ready(function() {
              $('#sidebarCollapse').on('click', function() {
                  $('#sidebar').toggleClass('active');
              });
          });
          $(document).ready(function () {
      $('#example').DataTable();
  });
      </script>
<script>
  $(document).ready(function() {
  @if(Session::has('success'))
  toastr.options =
  {
  "closeButton" : true,
  "progressBar" : true
  }
  toastr.success("{{ session('success') }}");
  @endif
  
  @if(Session::has('error'))
  toastr.options =
  {
  "closeButton" : true,
  "progressBar" : true
  }
  toastr.error("{{ session('error') }}");
  @endif
  
  @if(Session::has('info'))
  toastr.options =
  {
  "closeButton" : true,
  "progressBar" : true
  }
  toastr.info("{{ session('info') }}");
  @endif
  
  @if(Session::has('warning'))
  toastr.options =
  {
  "closeButton" : true,
  "progressBar" : true
  }
  toastr.warning("{{ session('warning') }}");
  @endif
  }); 
 </script>
@endpush