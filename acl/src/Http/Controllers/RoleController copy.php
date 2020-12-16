<?php

namespace ACL\Http\Controllers;

use Illuminate\Http\Request;
use ACL\DataBase\Models\Role;
use App\Http\Controllers\Controller;



class RoleController extends Controller
{
  
    public function index()
    {
        $roles = Role::query();

        if($keyword = request('search')) {
            $roles->where('name' , 'LIKE' , "%{$keyword}%")->orWhere('label' , 'LIKE' , "%{$keyword}%" );
        }
        $roles = $roles->latest()->paginate(20);
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:roles'],
            'label' => ['required', 'string', 'max:255'],
            'permissions' => ['required' , 'array']
        ]);


        $role = Role::create($data);
        $role->permissions()->sync($data['permissions']);

    }
   
}
