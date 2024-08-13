<?php

namespace App\Http\Controllers;

use App\Models\Rekap;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Response;

class RekapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $items = DB::table('presensi')
            ->join('users', 'users.id', '=', 'presensi.id_user')
            ->select('presensi.*', 'users.nama', 'users.kelas', 'users.nta', 'users.foto')
            ->get();
        $items = $items->unique('nama');


        return view('pages.admin.rekap.index', [
            'rekap' => $items
        ]);
    }

    public function nilai()
    {
        if (Auth::user()->roles == 'ADMIN' || Auth::user()->roles == 'PEMBINA') {
            $id = DB::table('presensi')
                ->join('users', 'users.id', '=', 'presensi.id_user')
                ->groupBy('id_user')
                ->select('presensi.*', 'users.nama', 'users.kelas', 'users.nta')
                ->get();
        } else {
            $id = DB::table('presensi')
                ->join('users', 'users.id', '=', 'presensi.id_user')
                ->groupBy('id_user')
                ->select('presensi.*', 'users.nama', 'users.kelas', 'users.nta')
                ->where('id_user', '=', Auth::user()->id)
                ->get();
        }

        $kelas7 = DB::table('users')
            ->select('kelas')
            ->where('kelas', 'LIKE', 'VII____')
            ->pluck('kelas');

        $kelas8 = DB::table('users')
            ->select('users.kelas')
            ->where('kelas', 'LIKE', 'VIII____')
            ->pluck('kelas');

        $kelas9 = DB::table('users')
            ->select('users.kelas')
            ->where('kelas', 'LIKE', 'IX____')
            ->pluck('kelas');

        return view('pages.admin.rekap.nilai', compact('id', 'kelas7', 'kelas8', 'kelas9'));
    }


    public function indexuser()
    {
        $items = Rekap::all();

        return view('pages.user.rekap.index', [
            'rekap' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_user)
    {
        // dd($id_user);
        // $items = Rekap::where('id_user', '=', $id)->get();
        $rekap = DB::table('presensi')->where('id_user', $id_user)->get();
        $items = DB::table('presensi')
            ->join('users', 'users.id', '=', 'presensi.id_user')
            ->select('presensi.*', 'users.nama', 'users.kelas', 'users.nta')
            ->where('presensi.id_user', $id_user)
            ->get();


        return view('pages.admin.rekap.show', [
            'items' => $items,
            'rekap' => $rekap
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
        $item = Rekap::findOrFail($id);

        return view('pages.admin.rekap.edit', [
            'rekap' => $item
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
        //
    }

    public function cetakp_pdf()
    {
        $items = DB::table('presensi')
            ->join('users', 'users.id', '=', 'presensi.id_user')
            ->select('presensi.*', 'users.nama', 'users.kelas', 'users.nta', 'users.foto')
            ->get();
        // $rekap = Rekap::all();
        $pdf = PDF::loadView('pages.admin.rekap.cetakppdf', ['rekap' => $items])->setpaper('A4', 'landscape');
        $output = $pdf->output();

        return new Response($output, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' =>  'inline; filename="invoice.pdf"',

        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Rekap::findOrFail($id);
        $item->delete();

        return redirect('rekap')->with('success', 'Data Rekap Berhasil Dihapus!');
    }
}
