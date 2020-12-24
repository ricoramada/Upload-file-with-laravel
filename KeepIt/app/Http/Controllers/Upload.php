<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;

class Upload extends Controller
{
    public function page()
    {
       return view('front');
    }

    // Upload File
      public function index(Request $request)
      {
        $destinationPath = public_path('fileToUpload');
        $data = $request->file('file');

        $input['nama_file'] = time().'.'.$data->getClientOriginalExtension();
        $data->move($destinationPath, $input['nama_file']);

        $file = new File();
        $file->nama_file = request('nama_file');

        $file->save();
        //return view('front');
        return back()->with('success', 'File Uploaded Successfully')->with('path', $input['nama_file']);
      }

    // Tampil Database
    public function data()
    {
        $data = File::all();
        return view('formdata',['data'=>$data]);
    }
}
