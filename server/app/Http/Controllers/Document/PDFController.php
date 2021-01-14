<?php

namespace App\Http\Controllers\Document;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document;
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

class PDFController extends Controller
{
    public static function renderAsHtml($documentId)
    {
        $document = Document::where('id', $documentId)->first();
        $html = view('pdf.show', ['document' => $document])->render();

        return $html;
    }
}
