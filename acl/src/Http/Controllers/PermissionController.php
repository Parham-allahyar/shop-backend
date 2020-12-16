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

   
}
