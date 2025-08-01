<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package; // ✅ This line is required

class PackageBrowseController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        return view('customer.dashboard', compact('packages'));
    }
}
