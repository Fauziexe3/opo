<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CobaController extends Controller
{
    //https://startbootstrap.com/theme/freelancer
    //https://demos.creative-tim.com/material-dashboard/pages/dashboard
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function awal()
    {
        return view('index');
    }
    public function index()
    {
        $tampil = Hotel::all();
        return view('tables', compact('tampil'));

        // $data = [
        //     'nama' => $request->$nama,
        //     'email' => $request->$email,
        //     'jml_orang' => $request->$jml_orang,
        //     'jml_kamar' => $request->$jml_kamar
        // ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'harga' => 'required',
            'jml_orang' => 'required',
            'jml_kamar' => 'required',

        ],[
        'nama.required' => ' Harap isi nama..',
        'email.required' => ' Harap isi Email..',
        'harga.required' => ' Harap isi Harga..',
        'jml_orang.required' => ' Harap isi jumlah orang yang menginap..',
        'jml_kamar.required' => ' Harap isi jumlah kamar yang di pesan..',

        ]);
        $data = [
            'nama' => $request->nama,
            'email' => $request->email,
            'harga' => $request->harga,
            'jml_orang' => $request->jml_orang,
            'jml_kamar' => $request->jml_kamar,
        ];
        Hotel::create($data);
        return redirect('/tampil');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'harga'=>'required',
            'jml_orang' => 'required',
            'jml_kamar' => 'required',

        ],[
            'nama.required' => ' Harap isi nama..',
            'email.required' => ' Harap isi Email..',
            'harga.required' => ' Harap isi Harga..',
            'jml_orang.required' => ' Harap isi jumlah orang yang menginap..',
            'jml_kamar.required' => ' Harap isi jumlah kamar yang di pesan..',

        ]);

        $data = [
            'nama' => $request->nama,
            'email' => $request->email,
            'harga' => $request->harga,
            'jml_orang' => $request->jml_orang,
            'jml_kamar' => $request->jml_kamar,
        ];
        Hotel::where('id' ,$id)->update($data);
        return redirect('/tampil');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Hotel::where('id',$id)->delete();
        return redirect('/tampil')->with('success', 'Data telah dihapus.');
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}