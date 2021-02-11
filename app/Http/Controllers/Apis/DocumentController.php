<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class DocumentController extends Controller
{
    /**
     * ...
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * ...
     */
    public function store(Request $request)

    {
        $validator = Validator::make($request->all(),
        [
            'user_id' => 'required',
            'file'=> 'required|mimes:doc,docx,pdf|max:5120'
        ]);


        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()],Response::HTTP_UNAUTHORIZED);
        }
        else if ($file = $request->file('file')){
            //storing into the document folder
            $file = $request->file->store('public/documents');

            //store your file into database
            $document= new Document();
            $document->title=$file;
            $document->user_id=$request->user_id;
            $document->save();

            return  response()->json([
                "success" =>true,
                "message" => "File Uploaded Successfully",
                "file" => $file
            ]);

        }


    }
}
