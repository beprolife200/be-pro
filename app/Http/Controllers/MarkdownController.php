<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Parsedown;

class MarkdownController extends Controller
{
    public function parse()
    {
        $content = request('content');
        $markdownContent = (new Parsedown)->setMarkupEscaped(true)->text($content);
        return response()->json(['body' => $markdownContent]);
    }
}
