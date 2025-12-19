<?php

namespace Vendor\StreamPackage\Http\Controllers;

use App\Http\Controllers\Controller;
use Vendor\StreamPackage\Models\Stream;

class StreamController extends Controller
{
    public function index()
    {
        $streams = Stream::all();
        return view('streampackage::index', compact('streams'));
    }
}
