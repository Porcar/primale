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
use App\Sexdate;
use App\Stock;
use App\Role;
use App\Tag;
use App\Services\RouteGeneratorService;


class AdminController extends Controller
{
  public function index()
  {
    return view('admin.index');
  }

  public function users_provider()
  {
    $providers = Provider::All();
    return view('provider.provider_list')->with(compact('providers'));
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
      $user->password = bcrypt('1234');
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
      $provider = Provider::find($id);

      return view("provider.edit")->with(compact('provider'));
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

      $provider = Provider::find($id);
      $provider->user->name = $request->input('name');
      $provider->user->lastname = $request->input('lastname');
      $provider->user->credential = $request->input('credential');
      $provider->user->phone = $request->input('phone');
      $provider->user->address = $request->input('address');
      $user->save();

      return redirect()->route('admin.provider');
  }


  public function show_provider($id)
  {
      $provider = Provider::find($id);
      $workers = Worker::where('provider_id',$provider->id)->get();

      return view("provider.show")->with(compact('provider','workers'));
  }

    public function users_worker()
    {
      $tags = Tag::All();

      if(Auth::user()->role->name == "Admin"){
        $workers = Worker::All();
      }elseif(Auth::user()->role->name == "Client"){
        $workers = Worker::All();
      }elseif(Auth::user()->role->name == "Provider"){
        $workers = Worker::where('provider_id', Auth::user()->provider->id)->get();
      }
      return view('worker.worker_list')->with(compact('workers','tags'));
    }

    public function users_worker_create()
    {
        $tags = Tag::All();
        return view("worker.create")->with(compact('tags'));
    }

    public function create_worker_user(Request $request, RouteGeneratorService $routeGenerator)
    {
        $messages = [];
        $validator = Validator::make($request->all(), [
            'username' => 'unique:users',
            'credential' => 'required|unique:users',
            'email' => 'required|unique:users',
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
        $user->password = bcrypt('1234');
        $user->image = 'img/avatar.png';
        $user->active = True;
        $user->role_id = 3;
        $user->save();

        $worker = new Worker();
        $worker->user_id = $user->id;
        $worker->description = $request->input('description');
        $worker->age = $request->input('age');
        $worker->price = $request->input('price');
        if(Auth::user()->role->name == "Admin"){
          $worker->provider_id = Auth::user()->id;
        }else{
        $worker->provider_id = Auth::user()->provider->id;
        }
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


        $tags = Tag::All();
        foreach ($tags as $tag) {
            if ($request->has('tag_'.$tag->id)) {
                $worker->tags()->attach($tag->id);
            }
        }


        return redirect()->route('admin.worker');
    }

    public function edit_worker($id)
    {
        $tags = Tag::All();
        $worker = Worker::find($id);

        return view("worker.edit")->with(compact('worker', 'tags'));
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

        $worker = Worker::find($id);
        $worker->user->name = $request->input('name');
        $worker->user->lastname = $request->input('lastname');
        $worker->user->credential = $request->input('credential');
        $worker->user->phone = $request->input('phone');
        $worker->user->address = $request->input('address');
        $worker->user->save();


        $worker->description = $request->input('description');
        $worker->age = $request->input('age');
        $worker->price = $request->input('price');


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

        if ($request->input('sex') == "True") {
            $worker->sex = True;
        }else{
            $worker->sex = False;
        }




        if ($request->file('image1')) {
            if ($request->file('image1')->isValid())
            {
                $destinationPath = base_path() . '/public/img/';
                $image_name = $request->file('image1')->getClientOriginalName();
                $image = $request->file('image1')->move($destinationPath, $image_name);
                $image_name = $image->getBasename();
                $worker->image1 = "img/".$image_name;
            }
        }
        if ($request->file('image2')) {
            if ($request->file('image2')->isValid())
            {
                $destinationPath = base_path() . '/public/img/';
                $image_name = $request->file('image2')->getClientOriginalName();
                $image = $request->file('image2')->move($destinationPath, $image_name);
                $image_name = $image->getBasename();
                $worker->image2 = "img/".$image_name;
            }
        }
        if ($request->file('image3')) {
            if ($request->file('image3')->isValid())
            {
                $destinationPath = base_path() . '/public/img/';
                $image_name = $request->file('image3')->getClientOriginalName();
                $image = $request->file('image3')->move($destinationPath, $image_name);
                $image_name = $image->getBasename();
                $worker->image3 = "img/".$image_name;
            }
        }
        if ($request->file('image4')) {
            if ($request->file('image4')->isValid())
            {
                $destinationPath = base_path() . '/public/img/';
                $image_name = $request->file('image4')->getClientOriginalName();
                $image = $request->file('image4')->move($destinationPath, $image_name);
                $image_name = $image->getBasename();
                $worker->image4 = "img/".$image_name;
            }
        }
        if ($request->file('image5')) {
            if ($request->file('image5')->isValid())
            {
                $destinationPath = base_path() . '/public/img/';
                $image_name = $request->file('image5')->getClientOriginalName();
                $image = $request->file('image5')->move($destinationPath, $image_name);
                $image_name = $image->getBasename();
                $worker->image5 = "img/".$image_name;
            }
        }
        if ($request->file('image6')) {
            if ($request->file('image6')->isValid())
            {
                $destinationPath = base_path() . '/public/img/';
                $image_name = $request->file('image6')->getClientOriginalName();
                $image = $request->file('image6')->move($destinationPath, $image_name);
                $image_name = $image->getBasename();
                $worker->image6 = "img/".$image_name;
            }
        }

        $worker->video = $this->YoutubeID($request->input('video'));
        $worker->save();


        $worker->tags()->detach();
        $tags = Tag::All();
        foreach ($tags as $tag) {
            if ($request->has('tag_'.$tag->id)) {
                $worker->tags()->attach($tag->id);
            }
        }


        return redirect()->route($routeGenerator->make('worker', auth()->user()));
    }


    function YoutubeID($url)
    {
        if(strlen($url) > 11)
        {
            if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match))
            {
                return $match[1];
            }
            else
                return false;
        }

        return $url;
    }


    public function show_worker($id)
    {
        $worker = Worker::find($id);
        $tags = Tag::All();

        return view("worker.show")->with(compact('worker', 'tags'));
    }



        public function users_client()
        {
          $clients = Client::All();
          return view('client.client_list')->with(compact('clients'));
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
            $user->password = bcrypt('1234');
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
            $client = Client::find($id);

            return view("client.edit")->with(compact('client'));
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

            $client = Client::find($id);
            $client->user->name = $request->input('name');
            $client->user->lastname = $request->input('lastname');
            $client->user->credential = $request->input('credential');
            $client->user->phone = $request->input('phone');
            $client->user->address = $request->input('address');
            $client->user->save();

            $client->age = $request->input('age');
            if ($request->input('sex') == "True") {
                $client->sex = True;
            }else{
                $client->sex = False;
            }
            $client->save();


            return redirect()->route($routeGenerator->make('client', auth()->user()));
        }


        public function show_client($id)
        {
            $client = Client::find($id);

            return view("client.show")->with(compact('client'));
        }


        public function create_sexdate(Request $request, RouteGeneratorService $routeGenerator)
        {


            $sexdate = new Sexdate();
            $sexdate->worker_id = $request->input('worker_id');
            $sexdate->day = $request->input('days');
            $sexdate->status = 'doing';
            $sexdate->hours = $request->input('hours');
            $sexdate->observation = $request->input('observation');
            if(Auth::user()->role->name == "Admin"){
              $sexdate->client_id = Auth::user()->id;
            }else{
              $sexdate->client_id = Auth::user()->client->id;
            }
            $sexdate->save();

              return redirect()->route('admin.sexdate');

        }


          public function show_sexdate($id)
            {
                $sexdate = Sexdate::find($id);
                return view("sexdate.show")->with(compact('sexdate'));
            }

            public function createwithclient($id)
              {
                  $worker = Worker::find($id);
                  return view("sexdate.createwithclient")->with(compact('worker'));
              }



          public function sexdate()
          {
            if(Auth::user()->role->name == "Admin"){
              $sexdates = Sexdate::all();
            }elseif(Auth::user()->role->name == "Client"){
              $sexdates = Sexdate::where('client_id', Auth::user()->client->id)->get();
            }elseif(Auth::user()->role->name == "Worker"){
              $sexdates = Sexdate::where('worker_id', Auth::user()->worker->id)->get();
            }elseif(Auth::user()->role->name == "Provider"){
              $workers = Worker::where('provider_id', Auth::user()->provider->id)->get();
              $sexdates = Sexdate::all();
            }
            if(Auth::user()->role->name == "Provider"){
            return view('sexdate.sexdate_list')->with(compact('sexdates', 'workers'));
            }
            return view('sexdate.sexdate_list')->with(compact('sexdates'));
          }

            public function delete_sexdate($id, RouteGeneratorService $routeGenerator)
            {
                $sexdate = Sexdate::find($id);
                $sexdate->delete();

                return redirect()->route('admin.sexdate');
                //return redirect()->route('admin.group.show',$id);
            }

            public function stock()
            {
                $stocks = Stock::all();
                return view('stock.stock_list')->with(compact('stocks'));
            }

            public function stock_create()
            {
                return view("stock.create");
            }

            public function create_stock(Request $request, RouteGeneratorService $routeGenerator)
            {
                //
                $messages = [];
                $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'description' => 'required',
                    'quantity' => 'required',
                    'price' => 'required',
                ],$messages);

                if ($validator->fails()) {
                    return redirect('admin/stock/create')->withErrors($validator)->withInput();
                }

                #create Stock
                $stock = new Stock();
                $stock->name = $request->input('name');
                $stock->description = $request->input('description');
                $stock->quantity = $request->input('quantity');
                $stock->price = $request->input('price');
                $stock->points = $request->input('points');
                $stock->save();


                return redirect()->route($routeGenerator->make('stock', auth()->user()));

            }

            public function edit_stock($id)
            {
                $stock = Stock::find($id);
                return view("stock.edit")->with(compact('stock'));
            }

            public function update_stock(Request $request, $id, RouteGeneratorService $routeGenerator)
            {
                //
                $messages = [];
                $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'description' => 'required',
                    'quantity' => 'required',
                    'price' => 'required',
                ],$messages);

                if ($validator->fails()) {
                    return redirect()->route('admin.stock');
                }

                #create Unit
                $stock = Stock::find($id);
                $stock->name = $request->input('name');
                $stock->description = $request->input('description');
                $stock->quantity = $request->input('quantity');
                $stock->price = $request->input('price');
                $stock->points = $request->input('points');
                $stock->save();



                return redirect()->route($routeGenerator->make('stock', auth()->user()));
                //return redirect()->route('admin.stock');
            }

            public function delete_stock($id, RouteGeneratorService $routeGenerator)
            {
                $stock = Stock::find($id);
                $stock->delete();

                return redirect()->route($routeGenerator->make('stock', auth()->user()));
            }


            public function tag()
            {
                $tags = Tag::all();
                return view('tag.tag_list')->with(compact('tags'));
            }

            public function tag_create()
            {
                return view("tag.create");
            }

            public function create_tag(Request $request, RouteGeneratorService $routeGenerator)
            {
                //
                $messages = [];
                $validator = Validator::make($request->all(), [
                    'name' => 'required',

                ],$messages);

                if ($validator->fails()) {
                    return redirect('admin/tag/create')->withErrors($validator)->withInput();
                }

                #create Stock
                $tag = new Tag();
                $tag->name = $request->input('name');
                $tag->save();


                return redirect()->route($routeGenerator->make('tag', auth()->user()));

            }

            public function edit_tag($id)
            {
                $tag = Tag::find($id);
                return view("tag.edit")->with(compact('tag'));
            }

            public function update_tag(Request $request, $id, RouteGeneratorService $routeGenerator)
            {
                //
                $messages = [];
                $validator = Validator::make($request->all(), [
                    'name' => 'required',

                ],$messages);

                if ($validator->fails()) {
                    return redirect()->route('admin.tag');
                }

                #create Unit
                $tag = Tag::find($id);
                $tag->name = $request->input('name');
                $tag->save();

                return redirect()->route($routeGenerator->make('tag', auth()->user()));
            }

            public function delete_tag($id, RouteGeneratorService $routeGenerator)
            {
                $tag = Tag::find($id);
                $tag->delete();

                return redirect()->route($routeGenerator->make('tag', auth()->user()));
            }


}
