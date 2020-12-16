<?php

namespace ACL\Http\Controllers;

use Illuminate\Http\Request;
use ACL\DataBase\Models\Permission;
use App\Http\Controllers\Controller;



class PermissionController extends Controller
{
  public function index()
  {
      $permissions = Permission::query();

      if($keyword = request('search')) {
          $permissions->where('name' , 'LIKE' , "%{$keyword}%")->orWhere('label' , 'LIKE' , "%{$keyword}%" );
      }

      $permissions = $permissions->latest()->paginate(20);
  }


  public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:permissions'],
            'label' => ['required', 'string', 'max:255'],
        ]);

        Permission::create($data);

    }

   
}
