<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;

class AnggaranController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Works = Work::where('status', 'pending')->paginate(5);

        return view('anggaran.index',compact('Works'))
            ->with('i', (request()->input('page', 1) - 1) * 5); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('anggaran.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'kegiatan' => 'required',
            'kode' => 'required',
            'uraian' => 'required',
            'tgl' => 'required',
            'jml_item' => 'required',
            'satuan_item' => 'required',
            'harga_satuan' => 'required'
        ]);
        $validate['total'] = (int)$request->jml_item * (int)$request->harga_satuan;
        $validate['status'] = 'pending';
        Work::create($validate);
   
        return redirect()->route('anggaran.index')
                        ->with('success','Berhasil Menyimpan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Work  $Work
     * @return \Illuminate\Http\Response
     */
    public function show(Work $Work)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Work  $Work
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Work = Work::findOrFail($id);
        return view('anggaran.edit',compact('Work'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Work  $Work
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'kegiatan' => 'required',
            'kode' => 'required',
            'uraian' => 'required',
            'tgl' => 'required',
            'jml_item' => 'required',
            'satuan_item' => 'required',
            'harga_satuan' => 'required'
        ]);
        $validate['total'] = (int)$request->jml_item * (int)$request->harga_satuan;
        $validate['status'] = 'pending';
        Work::findOrFail($id)->update($validate);
        return redirect()->route('anggaran.index')
                        ->with('success','Berhasil Update !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Work  $Work
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Work::findOrFail($id)->delete();
  
        return redirect()->route('anggaran.index')
                        ->with('success','Berhasil Hapus !');
    }
}
