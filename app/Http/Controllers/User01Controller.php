<?php

namespace App\Http\Controllers;


use App\Models\User01;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Golongan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AdminExport;
use App\Imports\AdminImport;
use App\Models\User as ModelsUser;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Response;


class User01Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = User::all()->where('roles' , 'ADMIN');

        return view('pages.admin.user01.index', [
            'user01' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.user01.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'nta' => 'required',
            'username' => 'required',
            'password' => 'required',
            // 'roles' => 'required',
            'foto' => 'required|image|mimes:jpeg,jpg,png| max:2000',
            
        ]);
        // dd($request->foto); kalau form ada filenya, itu harus pakai enctype
        $foto_admin = $request->foto;
        $nama_file = time().'.'.$foto_admin->getClientOriginalExtension();
        $foto_admin->move('foto_admin/' , $nama_file);
       

        User::create([
            'nama' => $request->nama,
            'username' => $request->username,
            // 'email' => $request->email,
            'nta' => $request->nta,
            'password' => Hash::make($request['password']),
            'roles' => 'ADMIN',
             'foto' => $nama_file,
        ]);
        
        // dd($request);
        return redirect('user01')->with('success', 'Data Admin Berhasi Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = User::findOrFail($id);
        $gol = Golongan::all();

        return view('pages.admin.user01.show', [
            'user01' => $item,
            'gol' => $gol
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = User::findOrFail($id);
        $gol = Golongan::all();
        // dd($gol);
        return view('pages.admin.user01.edit', [
            'user01' => $item,
            'gol' => $gol
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $this->validate($request, [
            'nta' => 'required',
            'nama' => 'required',
            'username' => 'required',
            // 'password' => 'required',
            'email' => 'required',
            'roles' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'no_tlp' => 'required',
            'id_golongan' => 'required',
            // 'jabatan' => 'required',
            'foto' => 'required|image|mimes:jpeg,jpg,png | max:2000',
        ]);

        $foto_admin = $request->foto;
        $nama_file = time().'.'.$foto_admin->getClientOriginalExtension();
        $foto_admin->move('foto_admin/' , $nama_file);

        User::where('id', $id)->update([
            'nta' => $request->nta,
            'nama' => $request->nama,
            'username' => $request->username,
            // 'password' => Hash::make($request->password),
            'email' => $request->email,
            'roles' => 'ADMIN',
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'no_tlp' => $request->no_tlp,
            'id_golongan' => $request->id_golongan,
            // 'jabatan' => $request->jabatan,
            'foto' => $nama_file
        ]);
        
        // dd($request);
        // return redirect('user01')->with('success', 'Data Admin Berhasi Diedit!');
        return redirect('user01');
    }

    public function cetak_pdf($id)
    {
        // dd($id);
        $user = User::findOrFail($id);
        // $user = User01::where('id', '=', $id)->get();
        // dd($pembina);
        $pdf = Pdf::loadview('pages.admin.user01.user01pdf', ['user' => $user])->setpaper('A4', 'potrait');
        // dd($pdf);
        return $pdf->download('data-user.pdf');
    }

    public function cetakall_pdf()
    {
      
        
        $user = User::all()->where('roles' , 'ADMIN');
        $pdf = PDF::loadView('pages.admin.user01.cetakallpdf', ['user' => $user])->setpaper('A4', 'landscape');
        $output = $pdf->output();

        return new Response($output, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' =>  'inline; filename="invoice.pdf"',
            
        ]);

    }

    public function print_pdf($id)
    {
        $user = User01::where('id', '=', $id)->get();
        $pdf = PDF::loadView('pages.admin.user01.user01pdf', ['user' => $user]);
        $output = $pdf->output();

        return new Response($output, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' =>  'inline; filename="invoice.pdf"',
        ]);
    }

    public function export_excel()
    {
        return Excel::download(new AdminExport, 'admin.xlsx');
    }

    // public function import_excel(Request $request)
    // {
    //     // validasi
    //     $this->validate($request, [
    //         'file' => 'required|mimes:csv,xls,xlsx'
    //     ]);

    //     // menangkap file excel
    //     $file = $request->file('file');

    //     // membuat nama file unik
    //     $nama_file = rand() . $file->getClientOriginalName();

    //     // upload ke folder file_siswa di dalam folder public
    //     $file->move('file_user', $nama_file);

    //     // import data
    //     Excel::import(new UserImport, public_path('/file_user/' . $nama_file));

    //     // notifikasi dengan session
    //     // Session::flash('sukses','Data Siswa Berhasil Diimport!');

    //     // alihkan halaman kembali
    //     return redirect('/user01')->with('sukses', 'Data Admin Berhasil Diimport!');
    // }


    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     $item = User::findOrFail($id);
    //     $item->delete();

    //     return redirect('user01')->with('success', 'Data Admin Berhasil Dihapus!');
    // }
}
