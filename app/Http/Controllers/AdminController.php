<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Carbon\Carbon;
use App\User;
use DateTime;
use Validator;
use Auth;
use App\Provider;
use App\Worker;
use App\Client;
use App\Role;
use App\Services\RouteGeneratorService;


class AdminController extends Controller
{
  public function index()
  {
    return view('admin.index');
  }

  public function users_provider()
  {
    $users = User::where('role_id',2)->get();
    return view('provider.provider_list')->with(compact('users'));
  }

  public function users_provider_create()
  {
      return view("provider.create");
  }

  public function create_provider_user(Request $request)
  {
      $messages = [];
      $validator = Validator::make($request->all(), [
          'name' => 'required',
          'lastname' => 'required',
          'username' => 'unique:users',
          'credential' => 'required|unique:users',
          'email' => 'required|unique:users',
          'phone' => 'required',
          'address' => 'required',
      ],$messages);

      if ($validator->fails()) {
          return redirect(url()->previous())->withErrors($validator)->withInput();
      }

      #create administrative user

      $user = new User();
      $user->name = $request->input('name');
      $user->lastname = $request->input('lastname');
      $user->email = $request->input('email');
      $user->username = $request->input('username');
      $user->credential = $request->input('credential');
      $user->phone = $request->input('phone');
      $user->address = $request->input('address');
      $user->password = bcrypt('1q2w3e4r5t');
      $user->image = 'img/avatar.png';
      $user->active = True;
      $user->role_id = 2;
      $user->save();

      $provider = new Provider();
      $provider->user_id = $user->id;
      $isworking = 1;
      $provider->save();

      return redirect()->route('admin.provider');
  }

  public function edit_provider($id)
  {
      $user = User::find($id);

      return view("provider.edit")->with(compact('user'));
  }

  public function update_provider(Request $request, $id)
  {

      $messages = [];
      $validator = Validator::make($request->all(), [
          'name' => 'required',
          'lastname' => 'required',
          'credential' => 'required',
          'phone' => 'required',
          'address' => 'required',
      ],$messages);

      if ($validator->fails()) {
          return redirect(url()->previous($id))->withErrors($validator)->withInput();
      }

      $user = User::find($id);
      $user->name = $request->input('name');
      $user->lastname = $request->input('lastname');
      $user->credential = $request->input('credential');
      $user->phone = $request->input('phone');
      $user->address = $request->input('address');
      $user->save();

      return redirect()->route('admin.provider');
  }


  public function show_provider($id)
  {
      $user = User::find($id);

      return view("provider.show")->with(compact('user'));
  }

    public function users_worker()
    {
      $users = User::where('role_id',3)->get();
      return view('worker.worker_list')->with(compact('users'));
    }

    public function users_worker_create()
    {
        return view("worker.create");
    }

    public function create_worker_user(Request $request, RouteGeneratorService $routeGenerator)
    {
        $messages = [];
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'lastname' => 'required',
            'username' => 'unique:users',
            'credential' => 'required|unique:users',
            'email' => 'required|unique:users',
            'phone' => 'required',
            'sex' => 'required',
            'age' => 'required',
            'address' => 'required',
        ],$messages);

        if ($validator->fails()) {
            return redirect(url()->previous())->withErrors($validator)->withInput();
        }

        $user = new User();
        $user->name = $request->input('name');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('email');
        $user->username = $request->input('username');
        $user->credential = $request->input('credential');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->password = bcrypt('1q2w3e4r5t');
        $user->image = 'img/avatar.png';
        $user->active = True;
        $user->role_id = 3;
        $user->save();

        $worker = new Worker();
        $worker->user_id = $user->id;
        $worker->description = $request->input('description');
        $worker->age = $request->input('age');
        $worker->price = $request->input('price');
        if ($request->input('sex') == "True") {
            $worker->sex = True;
        }else{
            $worker->sex = False;
        }

        if ($request->input('monday_active') == True) {
            $worker->monday_active = True;
            $worker->monday_hours = $request->input('monday_hours');
        }else{
            $worker->monday_active = False;
            $worker->monday_hours = 0;
        }
        if ($request->input('tuesday_active') == True) {
            $worker->tuesday_active = True;
            $worker->tuesday_hours = $request->input('tuesday_hours');
        }else{
            $worker->tuesday_active = False;
            $worker->tuesday_hours = 0;
        }
        if ($request->input('wednesday_active') == True) {
            $worker->wednesday_active = True;
            $worker->wednesday_hours = $request->input('wednesday_hours');
        }else{
            $worker->wednesday_active = False;
            $worker->wednesday_hours = 0;
        }
        if ($request->input('thursday_active') == True) {
            $worker->thursday_active = True;
            $worker->thursday_hours = $request->input('thursday_hours');
        }else{
            $worker->thursday_active = False;
            $worker->thursday_hours = 0;
        }
        if ($request->input('friday_active') == True) {
            $worker->friday_active = True;
            $worker->friday_hours = $request->input('friday_hours');
        }else{
            $worker->friday_active = False;
            $worker->friday_hours = 0;
        }
        if ($request->input('saturday_active') == True) {
            $worker->saturday_active = True;
            $worker->saturday_hours = $request->input('saturday_hours');
        }else{
            $worker->saturday_active = False;
            $worker->saturday_hours = 0;
        }
        if ($request->input('sunday_active') == True) {
            $worker->sunday_active = True;
            $worker->sunday_hours = $request->input('sunday_hours');
        }else{
            $worker->sunday_active = False;
            $worker->sunday_hours = 0;
        }

        $worker->save();



        return redirect()->route('admin.worker');
    }

    public function edit_worker($id)
    {
        $user = User::find($id);

        return view("worker.edit")->with(compact('user'));
    }

    public function update_worker(Request $request, $id, RouteGeneratorService $routeGenerator)
    {

        $messages = [];
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'lastname' => 'required',
            'credential' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ],$messages);

        if ($validator->fails()) {
            return redirect(url()->previous($id))->withErrors($validator)->withInput();
        }

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->lastname = $request->input('lastname');
        $user->credential = $request->input('credential');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->save();


        $user->worker->description = $request->input('description');
        $user->worker->age = $request->input('age');
        $user->worker->price = $request->input('price');


        if ($request->input('monday_active') == True) {
            $user->worker->monday_active = True;
            $user->worker->monday_hours = $request->input('monday_hours');
        }else{
            $user->worker->monday_active = False;
            $user->worker->monday_hours = 0;
        }
        if ($request->input('tuesday_active') == True) {
            $user->worker->tuesday_active = True;
            $user->worker->tuesday_hours = $request->input('tuesday_hours');
        }else{
            $user->worker->tuesday_active = False;
            $user->worker->tuesday_hours = 0;
        }
        if ($request->input('wednesday_active') == True) {
            $user->worker->wednesday_active = True;
            $user->worker->wednesday_hours = $request->input('wednesday_hours');
        }else{
            $user->worker->wednesday_active = False;
            $user->worker->wednesday_hours = 0;
        }
        if ($request->input('thursday_active') == True) {
            $user->worker->thursday_active = True;
            $user->worker->thursday_hours = $request->input('thursday_hours');
        }else{
            $user->worker->thursday_active = False;
            $user->worker->thursday_hours = 0;
        }
        if ($request->input('friday_active') == True) {
            $user->worker->friday_active = True;
            $user->worker->friday_hours = $request->input('friday_hours');
        }else{
            $user->worker->friday_active = False;
            $user->worker->friday_hours = 0;
        }
        if ($request->input('saturday_active') == True) {
            $user->worker->saturday_active = True;
            $user->worker->saturday_hours = $request->input('saturday_hours');
        }else{
            $user->worker->saturday_active = False;
            $user->worker->saturday_hours = 0;
        }
        if ($request->input('sunday_active') == True) {
            $user->worker->sunday_active = True;
            $user->worker->sunday_hours = $request->input('sunday_hours');
        }else{
            $user->worker->sunday_active = False;
            $user->worker->sunday_hours = 0;
        }

        if ($request->input('sex') == "True") {
            $user->worker->sex = True;
        }else{
            $user->worker->sex = False;
        }
        $user->worker->save();


        return redirect()->route($routeGenerator->make('worker', auth()->user()));
    }


    public function show_worker($id)
    {
        $user = User::find($id);

        return view("worker.show")->with(compact('user'));
    }



        public function users_client()
        {
          $users = User::where('role_id',4)->get();
          return view('client.client_list')->with(compact('users'));
        }

        public function users_client_create()
        {
            return view("client.create");
        }

        public function create_client_user(Request $request, RouteGeneratorService $routeGenerator)
        {
            $messages = [];
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'lastname' => 'required',
                'username' => 'unique:users',
                'credential' => 'required|unique:users',
                'email' => 'required|unique:users',
                'phone' => 'required',
                'sex' => 'required',
                'age' => 'required',
                'address' => 'required',
            ],$messages);

            if ($validator->fails()) {
                return redirect(url()->previous())->withErrors($validator)->withInput();
            }

            $user = new User();
            $user->name = $request->input('name');
            $user->lastname = $request->input('lastname');
            $user->email = $request->input('email');
            $user->username = $request->input('username');
            $user->credential = $request->input('credential');
            $user->phone = $request->input('phone');
            $user->address = $request->input('address');
            $user->password = bcrypt('1q2w3e4r5t');
            $user->image = 'img/avatar.png';
            $user->active = True;
            $user->role_id = 4;
            $user->save();

            $client = new client();
            $client->user_id = $user->id;
            $client->age = $request->input('age');
            if ($request->input('sex') == "True") {
                $client->sex = True;
            }else{
                $client->sex = False;
            }
            $client->save();



            return redirect()->route('admin.client');
        }

        public function edit_client($id)
        {
            $user = User::find($id);

            return view("client.edit")->with(compact('user'));
        }

        public function update_client(Request $request, $id, RouteGeneratorService $routeGenerator)
        {

            $messages = [];
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'lastname' => 'required',
                'credential' => 'required',
                'phone' => 'required',
                'address' => 'required',
            ],$messages);

            if ($validator->fails()) {
                return redirect(url()->previous($id))->withErrors($validator)->withInput();
            }

            $user = User::find($id);
            $user->name = $request->input('name');
            $user->lastname = $request->input('lastname');
            $user->credential = $request->input('credential');
            $user->phone = $request->input('phone');
            $user->address = $request->input('address');
            $user->save();

            $user->client->age = $request->input('age');
            if ($request->input('sex') == "True") {
                $user->client->sex = True;
            }else{
                $user->client->sex = False;
            }
            $user->client->save();


            return redirect()->route($routeGenerator->make('client', auth()->user()));
        }


        public function show_client($id)
        {
            $user = User::find($id);

            return view("client.show")->with(compact('user'));
        }







}
