<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use Illuminate\Http\Request;

class ArsipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->has('cari')){
            $arsips = Arsip::where('judul', 'LIKE', '%'.$request->cari.'%')->paginate(10);
        }else{
            $arsips = Arsip::latest()->paginate(10);
        }
        return view('arsip.index', [
            'arsips' => $arsips,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('arsip.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'keterangan' => 'required',
            'file' => 'file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:20048',
        ]);

        $arsip = new Arsip;
        $arsip->judul = $request->judul;
        $arsip->keterangan = $request->keterangan;
        if($request->hasFile('file')){
            $file = $request->file('file');
            $arsip->nama_file = $file->hashName();
            $request->file('file')->store('public/arsip_digital');
        }
        $arsip->save();

        return redirect()->route('arsip.index')->with('success', 'Arsip berhasil ditambahkan');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Arsip $arsip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Arsip $arsip)
    {
        return view('arsip.edit', compact('arsip'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Arsip $arsip)
    {
        $request->validate([
            'judul' => 'required',
            'keterangan' => 'required',
            'file' => 'file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:20048',
        ]);

        $arsip->judul = $request->judul;
        $arsip->keterangan = $request->keterangan;
        if($request->hasFile('file')){
            $file = $request->file('file');
            $arsip->nama_file = $file->hashName();
            $request->file('file')->store('public/arsip_digital');
        }
        $arsip->save();

        return redirect()->route('arsip.index')->with('success', 'Arsip berhasil diubah');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Arsip $arsip)
    {
        $arsip->delete();
        return redirect()->route('arsip.index')->with('success', 'Arsip berhasil dihapus');
    }
}
