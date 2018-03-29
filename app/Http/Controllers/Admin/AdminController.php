<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
      return view('admin.home');
    }


    // Create new manager account show form
    public function managerCreate()
    {
      return view('admin.managerCreate');
    }

    // Save manager account
    public function saveManager( Request $request )
    {
      DB::table('managers')->insert([
        'name'    => $request->input('name'),
        'email'    => $request->input('email'),
        'password'    => bcrypt($request->input('password'))
      ]);
      return redirect()->back()->with('status', 'Manager account created successfully.');
    }

    // Manager accounts list
    public function managersAccount()
    {
      $managers = DB::table('managers')->get();
      return view('admin.accountManagers', ['managers'=>$managers]);
    }

    // list of user accounts
    public function usersAccount()
    {
      $users = DB::table('users')->get();
      return view('admin.accountUsers', ['users'=>$users]);
    }


    // get top voted proposals list
    public function proposalsListByVote()
    {
      $proposals = DB::table('proposals')->orderBy('votes', 'DESC')->get();
      return view('admin.proposalsListByVote', ['proposals'=>$proposals]);
    }


}
