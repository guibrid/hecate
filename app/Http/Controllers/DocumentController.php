<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Document;
use Validator;
use App\Http\Requests\StoreDocument;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

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

        foreach ($request->documents as $key => $documentData) {
            $path = Storage::putFile('documents/'.$request->customer_id.'/'.$request->order_id, $documentData);
            $document = new Document;
            $document->title = $request->filename[$key];
            $document->path = $path;
            $document->size = Storage::size($path);
            $document->order_id = $request->order_id;
            $document->save();
        }

        return response()->json(['success'=>'Your documents are saved']);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $document = Document::where('id', $id)->first();
 

        if (Storage::delete($document->path)){
            $document->delete();
            return back()->with('success', 'Document deleted');
        } else {
            return back()->withErrors('File not found on server.');
        }
        
        
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
        $file_path = storage_path('app/'.$document->path);
        //$ext = pathinfo(storage_path().'app/'.$document->path, PATHINFO_EXTENSION);
        // Setup file headers
        $headers = [
            //'Content-Type' => $document->type,
         ];
        if ( file_exists( $file_path ) ) {
            // Send Download
            return response()->download( $file_path, $document->file, $headers );
        } else {
            // Error
            return back()->withErrors('File not found on server');
        }
 
    }

    /**
     * Ajaxcall to Display documents available for an order.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getDocuments(Request $request)
    {
        //TODO Ajouter la verification du user, si il appartient bien au customer associé à cette order
        $documents = Document::where('order_id', $request->order_id)->get();
        
        return view('orders/inc/documents')->with(['documents'=> $documents]);;
    }
}
