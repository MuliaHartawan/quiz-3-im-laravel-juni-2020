<?php

namespace App\Http\Controllers;

use App\ArtikelModel;
use Illuminate\Http\Request;
use ArtikelSeeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //mengambil data dari data model Artikel
        $artikel = ArtikelModel::getData();

        return view ('artikel.index', compact('artikel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //menampilkan halaman form create

       return view('artikel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //menambahkan pesan validasi
        

        //rules validasi inputan user
        $validtedData = $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'tag' => 'required',
        ], $messages);

        $slug = Str::slug($request->judul, '-');
        $data = $request->all();
        unset($data['_token']);

        //jika lolos verifikasi masukkan ke database
        ArtikelModel::simpan([    
            'judul' => $request->judul,
            'slug' => $slug,
            'isi' => $request->isi,
            'tag' => $request->tag,
            'user_id' => 1,
        ]);

        return redirect('/artikel')->with('sukses', 'Artikel Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //menampilkan detail artikel
        $artikel = ArtikelModel::getDataById($id)->first();

        return view ('artikel.view', compact('artikel'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //menampilkan form update

        $artikel = ArtikelModel::getDataById($id)->first();

        return view('artikel.update', compact('artikel'));
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
         //menambahkan pesan validasi
        $messages = [
            'required' => 'Kolom Tidak Boleh Kosong'
        ];

        //rules validasi inputan user
        $validtedData = $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'slug' => 'required',
            'tag' => 'required',
        ], $messages);

        $slug = Str::slug($request->judul, '-');
        $data = $request->all();
        unset($data['_token']);

        //jika lolos verifikasi masukkan ke database
        ArtikelModel::updateData([    
            'judul' => $request->judul,
            'slug' => $slug,
            'isi' => $request->isi,
            'tag' => $request->tag,
            'user_id' =>1
        ], $id);

        return redirect('/artikel')->with('sukses', 'Artikel Berhasil Ditambahkan');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //hapus data artikel
         $data = ArticleModel::hapus($id);

    }
}
