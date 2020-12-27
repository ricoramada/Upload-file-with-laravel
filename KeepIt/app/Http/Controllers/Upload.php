<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Data;
use Validator;

class Upload extends Controller
{
    public function upload(Request $req)
    {
      $this->validate($req,[
        'file' => 'required|mimes:jpg,jpeg,bmp,png,doc,docx,csv,rtf,xlsx,xls,txt,pdf',
      ]);
      $destinationPath = public_path('fileToUpload');
      $data = $req->file('file');

      $input['nama_file'] = time().'.'.$data->getClientOriginalExtension();
      $data->move($destinationPath, $input['nama_file']);
      $type = $data->getClientMimeType();

      $file = new Data();
      $file->id_kontak = Session()->get('id');
      $file->nama_file = request('nama_file');
      $file->type = $type;

      $file->save();
      //return view('front');
      return back()->with('success', 'File Uploaded Successfully')->with('path', $input['nama_file']);
    }

    public function hapus($id)
    {
        // hapus file
        $files = Data::where('id',$id)->first();
        File::delete('fileToUpload/'.$files->file);

        // hapus data
        Data::where('id',$id)->delete();
        // $hapus = Data::findOrFail($id);
        // if ($hapus->path) {
        //     unlink($hapus->public_path('fileToUpload'));
        // }
        // $hapus->delete();
        return redirect('/');
    }
}
