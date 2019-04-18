<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Document;

class DocumentController extends Controller
{
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
