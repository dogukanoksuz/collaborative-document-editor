<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function listAllDocuments()
    {
        // $documents = Auth::user()->document()->orderBy('updated_at', 'DESC')->get();

        return view("dashboard");
    }

    public function show($documentId)
    {
        $document = Document::findOrFail($documentId);

        return view('document.show', ['document' => $document]);
    }

    public function createNewDocument()
    {
        
    }
}
