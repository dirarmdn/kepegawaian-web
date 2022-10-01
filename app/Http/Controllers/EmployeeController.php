<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = DB::table('karyawan')->get();
        $golongan = DB::table('golongan')->get();
        return view('pegawai', compact(['pegawai', 'golongan']));
    }

    public function showdata()
    {
        $pegawai = DB::table('karyawan')->get();
        $golongan = DB::table('golongan')->get();
        return view('detail-pegawai', compact(['pegawai', 'golongan']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawai = DB::table('karyawan')->get();
        $golongan = DB::table('golongan')->get();
        return view('input-pegawai', compact(['pegawai', 'golongan']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nik' => '',
            'nip' => '',
            'nama' => '',
            'jenis_kelamin' => '',
            'tempat_lahir' => '',
            'tanggal_lahir' => '',
            'status_nikah' => '',
            'agama' => '',
            'foto' => 'image|file|max:2048',
            'alamat' => '',
            'id_golongan' => '',
            'telpon' => '',
        ]);

        DB::table('karyawan')->insert($validatedData);
        return redirect('data-pegawai')->with('success','Data berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pegawai = Employee::find($id);
        $golongan = DB::table('golongan')->get();
        return view('edit-pegawai', compact(['pegawai', 'golongan']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee, $id)
    {
        $this->validate($request,[
            'foto' => 'image|file|max:2048',
        ]);
        $employee = Employee::find($id);
        $employee->update($request->all());
        return redirect()->route('pegawai')->with(['info','Data berhasil Di Update']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee, $id)
    {
        $employee = Employee::find($id);
        if ($employee != null) {
            $employee->delete();
            return redirect()->route('pegawai')->with('success','Data berhasil Di Hapus');
        }
        return redirect()->route('pegawai')->with('error','Data gagal Di Hapus');
    }

    public function showdetail($id)
    {
        $pegawai = Employee::find($id);
        $golongan = DB::table('golongan')->get();
        return view('detail-pegawai', compact(['pegawai', 'golongan']));
    }

    public function indexkp(){
        
        $pegawai = DB::table('karyawan')
         ->join('golongan', 'golongan.id', '=', 'karyawan.id_golongan')
         ->get();
         return view('kepegawaian')->with('pegawai', $pegawai);
    }

    public function createkp(){
        $pegawai = DB::table('karyawan')->get();
        $golongan = DB::table('golongan')->get();
        return view('input-kepegawaian', compact(['pegawai', 'golongan']));
    }
    public function storekp(){
        $validatedData = $request->validate([
            'nip' => '',
            'nama' => '',
            'jenis_kelamin' => '',
            'id_golongan' => '',
        ]);
        DB::table('karyawan')->insert($validatedData);
        return redirect('kepegawaian')->with('success','Data berhasil Ditambahkan');
    }
    public function destroykp(){
        $employee = Employee::find($id);
        if ($employee != null) {
            $employee->delete();
            return redirect()->route('kepegawaian')->with('success','Data berhasil Di Hapus');
        }
        return redirect()->route('kepegawaian')->with('error','Data gagal Di Hapus');
    }
    public function showdetailkp($id){
        $pegawai = Employee::find($id);
        $golongan = DB::table('golongan')->get();
        return view('detail-kepegawaian', compact(['pegawai', 'golongan']));
    }
    
}
