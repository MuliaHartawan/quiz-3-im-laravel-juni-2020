<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ArtikelModel extends Model
{
    public static function simpan($data)
    {
        $newArtikel = DB::table('artikels')->insert($data);
        return $newArtikel;
    }

    public static function getData()
    {
        $data = DB::table('artikels')->get();
        return $data;
    }

    public static function getDataById($id)
    {
        $data = DB::table('artikels')->where('id', $id)->get();
        return $data;
    }

    public static function updateData($data, $id)
    {
        $update = DB::table('artikels')->where('id', $id)->update($data);
        return $update;
    }

    public static function hapus($id)
    {
        $data = DB::table('artikels')->where('id', $id)->delete();
        return $data;
    }

}
