<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function save($documentId, Request $request)
    {
        $document = Document::where('id', $documentId)->first();

        $document->update([ 
            'content' => $request->data
        ]);

        return response()->json(['message' => 'Success', 'state' => 'ok']);
    }

    public function delete($documentId)
    {
        $document = Document::where('id', $documentId)->first();

        $document->delete();

        return response()->json(['message' => 'Success', 'state' => 'ok']);
    }
}
