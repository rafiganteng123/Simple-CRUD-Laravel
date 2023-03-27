<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswas = siswa::latest()->paginate(5);

        return view('siswa.index', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'NIS' => 'required|unique:siswas,NIS|min:5|max:5',
            'Nama' => 'required',
            'Kelas' => 'required',
            'no_hp' => 'required|min:11|max:12',
            'keterangan' => 'required'
        ],[
            'NIS.required' => 'NIS Wajib Diisi',
            'NIS.unique' => 'NIS Sudah Tersedia',
            'NIS.min' => 'NIS Minimal 5 Angka',
            'NIS.max' => 'NIS Maksimal 5 Angka',
            'Nama.required' => 'Nama Wajib Diisi',
            'Kelas.required' => 'Kelas Wajib Diisi',
            'no_hp.required' => 'No.HP Wajib Diisi',
            'no_hp.min' => 'No.HP Minimal 11 Angka',
            'no_hp.max' => 'No.HP Maksimal 12 Angka',
            'keterangan.required' => 'Keterangan Wajib Diisi'
        ]);
        Siswa::create($request->all());

        return redirect()->route('siswa.index')->with('success','Data Siswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        return view('siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'Nama' => 'required',
            'Kelas' => 'required',
            'no_hp' => 'required',
            'keterangan' => 'required'
        ],[
            'Nama.required' => 'Nama Wajib Diisi',
            'Kelas.required' => 'Kelas Wajib Diisi',
            'no_hp.required' => 'No.HP Wajib Diisi',
            'keterangan.required' => 'Keterangan Wajib Diisi'
        ]);
        $siswa->update($request->all());

        return redirect()->route('siswa.index')->with('success','Data Siswa Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();

        return redirect()->route('siswa.index')->with('success','Data Siswa Berhasil Dihapus');
    }
}