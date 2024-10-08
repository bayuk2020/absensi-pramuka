<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiswaDatadiri;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SiswaExport;
use App\Imports\SiswaImport;
use App\Models\User;
use App\Models\Golongan;
use Illuminate\Support\Str;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SiswaDatadiriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = User::all()->where('roles', 'USER');
        $user = Auth::user()->roles;


        // return view('pages.admin.siswa.datadiri.index', [
        //     'siswa' => $items,
        //     'user' => $user
        // ]);
        return view('pages.admin.siswa.datadiri.index', compact('siswa', 'user'));
    }

    public function indexuser()
    {
        $items = SiswaDatadiri::all();

        return view('pages.user.siswa.datadiri.index', [
            'siswa' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_golongan = Golongan::pluck('nama_golongan', 'id_golongan');
        return view('pages.admin.siswa.datadiri.create', compact('list_golongan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'nama' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'kelas' => 'required',
            'nta' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'no_tlp' => 'required',
            // 'id_regu' => 'required'
            // 'jabatan' => 'required'
        ]);

        $foto_siswa = $request->foto;
        $nama_file = time() . '.' . $foto_siswa->getClientOriginalExtension();
        $foto_siswa->move('foto_siswa/', $nama_file);

        SiswaDatadiri::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request['password']),
            'kelas' => $request->kelas,
            'nta' => $request->nta,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'roles' => 'USER',
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'no_tlp' => $request->no_tlp,
            // 'id_regu' => $request->id_regu,
            // 'jabatan' => $request->jabatan,
            'id_golongan' => $request->id_golongan,
            'foto' => $nama_file,
        ]);
        return redirect('siswa')->with('success', 'Data Siswa Berhasil Ditambahkan!');

        // dd($siswa);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = SiswaDatadiri::findOrFail($id);

        return view('pages.admin.siswa.datadiri.show', [
            'siswa' => $item
        ]);
    }

    public function cetak_pdf($id)
    {
        // dd($id);
        $siswa = SiswaDatadiri::where('id', '=', $id)->get();
        // dd($siswa);
        $pdf = Pdf::loadview('pages.admin.siswa.datadiri.siswapdf', ['siswa' => $siswa])->setpaper('A4', 'potrait');
        // dd($pdf);
        return $pdf->download('data-siswa.pdf');
    }

    public function cetakall_pdf()
    {


        $user = SiswaDatadiri::all()->where('roles', 'USER');
        $pdf = PDF::loadView('pages.admin.siswa.datadiri.cetakallpdf', ['user' => $user])->setpaper('A4', 'landscape');
        $output = $pdf->output();

        return new Response($output, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' =>  'inline; filename="invoice.pdf"',

        ]);
    }

    public function print_pdf($id)
    {
        $siswa = SiswaDatadiri::where('id', '=', $id)->get();
        $pdf = PDF::loadView('pages.admin.siswa.datadiri.siswapdf', ['siswa' => $siswa]);
        $output = $pdf->output();

        return new Response($output, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' =>  'inline; filename="invoice.pdf"',
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
        $item = SiswaDatadiri::findOrFail($id);
        $list_golongan = Golongan::pluck('nama_golongan', 'id_golongan');

        return view(
            'pages.admin.siswa.datadiri.edit',
            compact('list_golongan', 'item'),
            [
                'siswa' => $item
            ]
        );
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
        // dd($request, $id);

        if ($request['password'] != null) {
            $this->validate($request, ['password' => 'required']);
        } else {
            $pw = SiswaDatadiri::where('id', '=', $id)->get('password');
            $request['password'] = $pw;
        }
        $this->validate($request, [
            'nta' => 'required',
            'nama' => 'required',
            'username' => 'required',
            'email' => 'required',
            'kelas' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'no_tlp' => 'required',
            // 'jabatan' => 'required',
            'foto' => 'image|mimes:jpeg,jpg,png | max:2000',
        ]);

        $foto_siswa = $request->foto;
        $nama_file = time() . '.' . $foto_siswa->getClientOriginalExtension();
        $foto_siswa->move('foto_siswa/', $nama_file);

        SiswaDatadiri::where('id', $id)->update([
            'nta' => $request->nta,
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => $request->password,
            'kelas' => $request->kelas,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'no_tlp' => $request->no_tlp,
            'id_golongan' => $request->id_golongan,
            // 'jabatan' => $request->jabatan,
            'foto' => $nama_file,
        ]);
        return redirect('siswa')->with('success', 'Data Siswa Berhasil Diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = SiswaDatadiri::findOrFail($id);
        $item->delete();

        return redirect('siswa ')->with('success', 'Data Siswa Berhasil Dihapus!');
    }

    public function export_excel()
    {
        return Excel::download(new SiswaExport, 'siswa.xlsx');
    }

    public function import_excel(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
        $file->move('file_siswa', $nama_file);

        // import data
        Excel::import(new SiswaImport, public_path('/file_siswa/' . $nama_file));

        // notifikasi dengan session
        // Session::flash('sukses','Data Siswa Berhasil Diimport!');

        // alihkan halaman kembali
        return redirect('/siswa')->with('sukses', 'Data Siswa Berhasil Diimport!');
    }
}
