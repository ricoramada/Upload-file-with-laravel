<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Data;
use Validator;

class Upload extends Controller
{
    public function upload(Request $req)
    {
      // Data Upload
      $this->validate($req,[
        'file' => 'required|mimes:jpg,jpeg,bmp,png,doc,docx,csv,rtf,xlsx,xls,txt,pdf',
      ]);
      // panggil file required
      $file = $req->file('file');
      // Nama buat filenya
      $newName = $file->getClientOriginalName();
      // lokasi penyimpanan file
      $path = Storage::putFileAs('public/upload', $req->file('file'), $newName);
      // mengambil data id kontak/usernya
      $id_user = Session()->get('id');
      // file type
      $type = $file->getClientMimeType();

      // mengubahnya ke data array
      $data = [
        'id_kontak' => $id_user,
        'nama_file' => $newName,
        'type' => $type,
        'path' => $path
      ];
      // lalu data array tadi dimasukan ke table data
      Data::create($data);
      // Lalu kembali ke halaman awal
      return back()->with('success', 'File Uploaded Successfully')->with('path', $newName);
    }

    public function hapus($id)
    {
        // Data Hapus
        // mencari id data
        $files = Data::find($id);
        try {
          // delete data
          $files->delete();
          // dan delete file yang ada distorage
          Storage::disk('local')->delete($files->path, $files->nama_file);
          return redirect('/');
        } catch (\Exception $e) {
          return $e->getMessage();
        }
    }

    public function download($id)
    {
      // Data Download
      // mencari id data
      $file = Data::find($id);
      try {
        // Menggunakan storage local lalu mendownloadnya
        return Storage::disk('local')->download($file->path, $file->nama_file);
      } catch (\Exception $e) {
        return $e->getMessage();
      }
    }
}
