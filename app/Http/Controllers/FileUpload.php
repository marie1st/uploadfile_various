<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\testf;

class FileUpload extends Controller
{
    public function store(Request $request)
    {

     $request -> validate([
            'email' => 'unique:employees,email,$this->id,id',
            'clinic_file' => 'required|file|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',
      ]);  
      
      $email = $request->email;
      $uploadedFile = $request->file('clinic_file');
      $filename = time().$uploadedFile->getClientOriginalName();

      Storage::disk('local')->putFileAs(
        'files', new File('/testcenter'));

      $testf = new testf ([
        'email' => $request->email,
        'clinic_file' => $filename,
      ]);
      $testf->save();

      return response()->json([
        'email:' => $testf->email,
        'clinic_file:' => $testf->clinic_file,
      ], 200);
    }
}
