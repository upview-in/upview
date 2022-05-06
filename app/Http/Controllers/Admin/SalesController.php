<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function queries()
    {
        $queries = ContactUs::search()->paginate(10);

        return view('admin.sales.queries.index', compact('queries'));
    }
}
