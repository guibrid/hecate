<?php

use Illuminate\Database\Seeder;
use App\Document;

class DocumentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $document = new Document();
        $document->title = 'Bill of lading';
        $document->file  = 'bill-of-lading.pdf';
        $document->path  = '1/1/dfertyuhfdc/';
        $document->size  = 1;
        $document->type  = 'application/pdf';
        $document->order_id  = 1;
        $document->save();
    }
}
