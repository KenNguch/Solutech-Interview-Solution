<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DocumentController extends Controller
{

    public function store(Request $request)

    {
        $validator = Validator::make($request->all(),
        [
            'user_id' => 'required|number',
            'file'=> 'required|mimes:doc,docx,pdf|max:5120'
        ]);


        if ($validator->fails()) {
            return response()->json(['error'=>$validator->erors()],Response::HTTP_UNAUTHORIZED);
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
