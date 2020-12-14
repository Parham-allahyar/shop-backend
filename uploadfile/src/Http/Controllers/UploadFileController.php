<?php

namespace Uploadfile\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class uploadfileController extends Controller
{
    public function create (Request $request)
    {
        $file = $request->file('file');
        $New_fileName =$file->getClientOriginalName() + Carbon::now();
        $file->move('images',$New_fileName);
        return $New_fileName;
    }

}
