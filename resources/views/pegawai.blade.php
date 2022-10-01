@extends('layouts.main')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" integrity="sha512-oe8OpYjBaDWPt2VmSFR+qYOdnTjeV9QPLJUeqZyprDEQvQLJ9C5PCFclxwNuvb/GQgQngdCXzKSFltuHD3eCxA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@section('content')

<div class="m-10 mx-auto">
  <div class="text-3xl text-ebony-clay-900 font-main mb-8 font-bold">Data Pegawai</div>
  <a href="/tambah-pegawai" class="hover:text-ebony-clay-400 hover:bg-ebony-clay-900 transition-all duration-300 text-ebony-clay-900 shadow-lg py-2 px-3 w-36 bg-[#b2fefe] rounded-lg font-extrabold font-main">+ Tambah Data</a>
  <div class="overflow-hidden w-fit relative mx-auto mt-8">
    <table class="mb-3 text-sm text-center w-full mx-auto" id="example">
        <thead class="text-md bg-gray-100 text-basic border font-pop">
                <th scope="col" class="py-3 px-14 border-r">No</th>
                <th scope="col" class="py-3 px-14 border-r">NIP</th>
                <th scope="col" class="py-3 px-14 border-r">Nama</th>
                <th scope="col" class="py-3 border-r">Jenis Kelamin</th>
                <th scope="col" class="py-3 px-14 border-r">Status</th>
                <th scope="col" class="py-3 px-14 border-r">Gol</th>
                <th scope="col" class="py-3 px-14 border-r">Agama</th>
                <th scope="col" class="py-3 px-14">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-base">
          @foreach ($pegawai as $key => $p)
            <tr class="bg-white border">
                <td class="py-3 px-14 border">{{ $key + 1 }}</td>
                <td class="py-3 px-14 border">{{ $p->nip }}</td>
                <td class="py-3 border">{{ $p->nama }}</td>
                <td class="py-3 px-14 border">{{ $p->jenis_kelamin }}</td>
                <td class="py-3 border">{{ $p->status_nikah }}</td>
                <td class="py-3 px-14 border">{{ $p->id_golongan }}</td>
                <td class="py-3 px-14 border">{{ $p->agama }}</td>
                
                <td class="gap-2 flex justify-between items-center p-3">
                  {{-- <form action=""  method="POST"></form> --}}
                    <a href="/edit-pegawai/{{ $p->id }}" class="text-white bg-sky-300 hover:bg-sky-500 rounded-lg text-sm py-3 px-3">
                      <i class="fa-solid fa-pen"></i>
                    </a>
                    <a href="#" data-id="{{ $p->id }}" class="text-white delete bg-red-500 hover:bg-red-800 rounded-lg text-sm py-3 px-3">
                      <i class="fa-solid fa-trash"></i>                   
                    </a>
                    {{-- <button type="submit" class="text-white delete bg-red-500 rounded-lg text-sm py-3 px-3">
                      <i class="fa-solid fa-trash"></i>                   
                    </button> --}}
                    <a href="/show-pegawai/{{ $p->id }}" class="text-white bg-gray-500 hover:bg-gray-800 hover:text-white rounded-lg text-sm py-3 px-3">
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
        window.location = "/delete-pegawai/"+id+""
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