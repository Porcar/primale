<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Validator;

use App\User;
use App\Role;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    public function admin()
    {
      return view('admin.index');
    }

    public function client()
    {
      return view('client.index');
    }

    public function worker()
    {
      return view('worker.index');
    }

    public function provider()
    {
      return view('provider.index');
    }


}
