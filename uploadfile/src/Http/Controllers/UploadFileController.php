<?php

namespace Uploadfile\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class uploadfileController extends Controller
{
    public function create (Request $request)
    {
        $file = $request->file('file');
        $New_fileName =$file->getClientOriginalName();
        $pathName = base_path();
        $file->move($pathName,$New_fileName);
    }

}
