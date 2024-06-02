<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Golongan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Response;

class GolonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->roles;

        $items = Golongan::all();
        return view('pages.admin.golongan.index', compact('items','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.golongan.create');
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
            'id_golongan' => 'required',
            'nama_golongan' => 'required',
            'keterangan' => 'required',
        ]);

        Golongan::create([
            'id_golongan' => $request->id_golongan,
            'nama_golongan' => $request->nama_golongan,
            'keterangan' => $request->keterangan,
        ]);

        return redirect('golongan')->with('success', 'Data Golongan Berhasi Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Golongan::findOrFail($id);

        return view('pages.admin.golongan.show', [
            'Golongan' => $item
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
        $item = Golongan::findOrFail($id);
        // dd($gol);
        return view('pages.admin.golongan.edit', [
            'golongan' => $item
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
        $data = $request->all();
        
        $item = Golongan::findOrFail($id);

        $item->update($data);

        return redirect('golongan')->with('success', 'Data Golongan Berhasil Diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function cetak_pdf()
    {
      
        $rekap = Golongan::all();
        $pdf = PDF::loadView('pages.admin.golongan.cetak
        ', ['rekap' => $rekap])->setpaper('A4', 'landscape');
        $output = $pdf->output();

        return new Response($output, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' =>  'inline; filename="invoice.pdf"',
            
        ]);

    }

    public function destroy($id)
    {
        $item = Golongan::findOrFail($id);
        $item->delete();

        return redirect('golongan')->with('success', 'Data Golongan Berhasil Dihapus!');
    }
}
