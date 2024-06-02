<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tahun;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\User as ModelsUser;
use Illuminate\Support\Str;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TahunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $items = Tahun::all();


        return view('pages.admin.tahun.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.tahun.create');
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
            'nama_tahun' => 'required',
            'keterangan' => 'required',
        ]);
        Tahun::create([
            'nama_tahun' => $request->nama_tahun,
            'keterangan' => $request->keterangan,
        ]);
        
        return redirect('tahun')->with('success', 'Data Tahun Ajaran Berhasi Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

    public function cetak_pdf()
    {
      
        $rekap = Tahun::all();
        $pdf = PDF::loadView('pages.admin.tahun.cetak
        ', ['rekap' => $rekap])->setpaper('A4', 'landscape');
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
        $item = Tahun::findOrFail($id);
        $item->delete();

        return redirect('tahun')->with('success', 'Data Tahun Ajaran Berhasil Dihapus!');
    }
}
