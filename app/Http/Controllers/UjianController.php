<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ujian;
class UjianController extends Controller
{
    public function index()
    {
    	$ujian = Ujian::all();
    	return view('ujian', ['ujian' => $ujian]);
}
public function tambah()
{
    return view('tambah');
}
public function store(Request $request)
    {
    	$this->validate($request,[
    		'nama' => 'required',
    		'dosen' => 'required',
            'jumlah' => 'required',
            'keterangn' => 'required'
    	]);
 
        Ujian::create([
            'nama_mk' => $request->nama,
    		'dosen' => $request->dosen,
            'jumlah_soal' => $request->jumlah,
            'keterangn' => $request->keterangn
    		
    	]);
 
    	return redirect('/ujian');
    }
    public function edit($id)
{
   $ujian = Ujian::find($id);
   return view('edit', ['ujian' => $ujian]);
}
public function update($id, Request $request)
{
    $this->validate($request,[
        'nama' => 'required',
        'dosen' => 'required',
        'jumlah' => 'required',
        'keterangn' => 'required'
    ]);

    $ujian = Ujian::find($id);
    $ujian->nama_mk = $request->nama;
    $ujian->dosen = $request->dosen;
    $ujian->jumlah_soal = $request->jumlah;
    $ujian->keterangn = $request->keterangn;
    $ujian->save();
    return redirect('/ujian');
}
public function delete($id)
{
    $ujian = Ujian::find($id);
    $ujian->delete();
    return redirect('/ujian');
}
}