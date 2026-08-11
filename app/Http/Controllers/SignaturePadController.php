<?php

  

namespace App\Http\Controllers;

  

use Illuminate\Http\Request;

  

class SignaturePadController extends Controller

{

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function index()

    {

        return view('pages.signaturePad');

    }

  

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function upload(Request $request)

    {
        $folderPath = public_path('upload/');
        $image_parts = explode(";base64,", $request->signed);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = $folderPath . uniqid() . '.'.$image_type;

        $imgUrl = basename($file);
        file_put_contents($file, $image_base64);
        
        // return back()->with(['success', 'success Full upload signature', 'imgLink' => 'test']);

        return response()->json(['success'=>'successs', 'message' => "Successfully signed!", 'imgUrl' => $imgUrl]);


    }

}