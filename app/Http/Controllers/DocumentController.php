<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\Document;
use App\Http\Requests\StoreDocument;

class DocumentController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/documents/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocument $request)
    {
        //$disk = Storage::disk('local');
        //var_dump($disk);
        //$exists = Storage::disk('local')->exists('toto.txt');
        //var_dump($exists);
        //var_dump($request->file());
        //var_dump($request->input());
        $path = $request->file('document')->store('documents/1/1');
        var_dump($path);
        die;
        return redirect('/admin/documents/create');
    }
    /**
     * Download a document.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download($id)
    {
        //Get document collection
        $document = Document::where('id', $id)->first();

        //TODO Check if this user bellong to customer refered in the order associate at this document

        // Check if file exists in app/storage/file folder
        $file_path = storage_path('app/documents/'.$document->path . $document->file);

        // Setup file headers
        $headers = [
            'Content-Type' => $document->type,
         ];

        if ( file_exists( $file_path ) ) {
            // Send Download
            return response()->download( $file_path, $document->file, $headers );
        } else {
            // Error
            exit( 'Requested file does not exist on our server!' );
        }
 
    }
}
