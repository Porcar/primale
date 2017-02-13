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
use App\TagWorker;
use App\Media;
use App\Schedule;
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

      return view("provider.show")->with(compact('provider'));
  }

    public function users_worker()
    {
      $tags = Tag::All();
      $workers = Worker::All();

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
        if ($request->input('location_workersplace') == "on") {
            $worker->location_workersplace = True;
        }else{
            $worker->location_workersplace = False;
        }
        if ($request->input('location_clientsplace') == "on") {
            $worker->location_clientsplace = True;
        }else{
            $worker->location_clientsplace = False;
        }
        if ($request->input('location_hotel') == "on") {
            $worker->location_hotel = True;
        }else{
            $worker->location_hotel = False;
        }
        if ($request->input('location_other') == "on") {
            $worker->location_other = True;
        }else{
            $worker->location_other = False;
        }
        if ($request->input('sex') == "True") {
            $worker->sex = True;
        }else{
            $worker->sex = False;
        }
        $worker->save();



        $schedule = new Schedule();
        $schedule->worker_id = $worker->id;
        if ($request->input('monday_active') == "on") {
            $schedule->monday_start_hour = $request->input('monday_start_hour');
            $schedule->monday_end_hour = $request->input('monday_end_hour');
            $schedule->monday_active = True;
            $schedule->monday_hours = $request->input('monday_end_hour') - $request->input('monday_start_hour');
        }
        if ($request->input('tuesday_active') == "on") {
            $schedule->tuesday_start_hour = $request->input('tuesday_start_hour');
            $schedule->tuesday_end_hour = $request->input('tuesday_end_hour');
            $schedule->tuesday_active = True;
            $schedule->tuesday_hours = $request->input('tuesday_end_hour') - $request->input('tuesday_start_hour');
        }
        if ($request->input('wednesday_active') == "on") {
            $schedule->wednesday_start_hour = $request->input('wednesday_start_hour');
            $schedule->wednesday_end_hour = $request->input('wednesday_end_hour');
            $schedule->wednesday_active = True;
            $schedule->wednesday_hours = $request->input('wednesday_end_hour') - $request->input('wednesday_start_hour');
        }
        if ($request->input('thursday_active') == "on") {
            $schedule->thursday_start_hour = $request->input('thursday_start_hour');
            $schedule->thursday_end_hour = $request->input('thursday_end_hour');
            $schedule->thursday_active = True;
            $schedule->thursday_hours = $request->input('thursday_end_hour') - $request->input('thursday_start_hour');
        }
        if ($request->input('friday_active') == "on") {
            $schedule->friday_start_hour = $request->input('friday_start_hour');
            $schedule->friday_end_hour = $request->input('friday_end_hour');
            $schedule->friday_active = True;
            $schedule->friday_hours = $request->input('friday_end_hour') - $request->input('friday_start_hour');
        }
        if ($request->input('saturday_active') == "on") {
            $schedule->saturday_start_hour = $request->input('saturday_start_hour');
            $schedule->saturday_end_hour = $request->input('saturday_end_hour');
            $schedule->saturday_active = True;
            $schedule->saturday_hours = $request->input('saturday_end_hour') - $request->input('saturday_start_hour');
        }
        if ($request->input('sunday_active') == "on") {
            $schedule->sunday_start_hour = $request->input('sunday_start_hour');
            $schedule->sunday_end_hour = $request->input('sunday_end_hour');
            $schedule->sunday_active = True;
            $schedule->sunday_hours = $request->input('sunday_end_hour') - $request->input('sunday_start_hour');
        }

        $schedule->save();



        $tags = Tag::All();
        foreach ($tags as $tag) {
            if ($request->has('tag_'.$tag->id)) {
                $tag_worker = new TagWorker();
                $tag_worker->worker_id = $worker->id;
                $tag_worker->tag_id = $tag->id;
                $tag_worker->price = $request->input('price_'.$tag->id);
                $tag_worker->save();
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
        if ($request->input('location_workersplace') == "on") {
            $worker->location_workersplace = True;
        }else{
            $worker->location_workersplace = False;
        }
        if ($request->input('location_clientsplace') == "on") {
            $worker->location_clientsplace = True;
        }else{
            $worker->location_clientsplace = False;
        }
        if ($request->input('location_hotel') == "on") {
            $worker->location_hotel = True;
        }else{
            $worker->location_hotel = False;
        }
        if ($request->input('location_other') == "on") {
            $worker->location_other = True;
        }else{
            $worker->location_other = False;
        }

        if ($request->input('sex') == "True") {
            $worker->sex = True;
        }else{
            $worker->sex = False;
        }
        $worker->save();

        $schedule = $worker->schedule;
        if ($request->input('monday_active') == "on") {
            $schedule->monday_start_hour = $request->input('monday_start_hour');
            $schedule->monday_end_hour = $request->input('monday_end_hour');
            $schedule->monday_active = True;
            $schedule->monday_hours = $request->input('monday_end_hour') - $request->input('monday_start_hour');
        }else{$schedule->monday_active = False;}
        if ($request->input('tuesday_active') == "on") {
            $schedule->tuesday_start_hour = $request->input('tuesday_start_hour');
            $schedule->tuesday_end_hour = $request->input('tuesday_end_hour');
            $schedule->tuesday_active = True;
            $schedule->tuesday_hours = $request->input('tuesday_end_hour') - $request->input('tuesday_start_hour');
        }else{$schedule->tuesday_active = False;}
        if ($request->input('wednesday_active') == "on") {
            $schedule->wednesday_start_hour = $request->input('wednesday_start_hour');
            $schedule->wednesday_end_hour = $request->input('wednesday_end_hour');
            $schedule->wednesday_active = True;
            $schedule->wednesday_hours = $request->input('wednesday_end_hour') - $request->input('wednesday_start_hour');
        }else{$schedule->wednesday_active = False;}
        if ($request->input('thursday_active') == "on") {
            $schedule->thursday_start_hour = $request->input('thursday_start_hour');
            $schedule->thursday_end_hour = $request->input('thursday_end_hour');
            $schedule->thursday_active = True;
            $schedule->thursday_hours = $request->input('thursday_end_hour') - $request->input('thursday_start_hour');
        }else{$schedule->thursday_active = False;}
        if ($request->input('friday_active') == "on") {
            $schedule->friday_start_hour = $request->input('friday_start_hour');
            $schedule->friday_end_hour = $request->input('friday_end_hour');
            $schedule->friday_active = True;
            $schedule->friday_hours = $request->input('friday_end_hour') - $request->input('friday_start_hour');
        }else{$schedule->friday_active = False;}
        if ($request->input('saturday_active') == "on") {
            $schedule->saturday_start_hour = $request->input('saturday_start_hour');
            $schedule->saturday_end_hour = $request->input('saturday_end_hour');
            $schedule->saturday_active = True;
            $schedule->saturday_hours = $request->input('saturday_end_hour') - $request->input('saturday_start_hour');
        }else{$schedule->saturday_active = False;}
        if ($request->input('sunday_active') == "on") {
            $schedule->sunday_start_hour = $request->input('sunday_start_hour');
            $schedule->sunday_end_hour = $request->input('sunday_end_hour');
            $schedule->sunday_active = True;
            $schedule->sunday_hours = $request->input('sunday_end_hour') - $request->input('sunday_start_hour');
        }else{$schedule->sunday_active = False;}

        $schedule->save();



        foreach($worker->tagsworkers as $tagsw){
          $tagsw->delete();
        }
        $tags = Tag::All();
        foreach ($tags as $tag) {
            if ($request->has('tag_'.$tag->id)) {
                $tag_worker = new TagWorker();
                $tag_worker->worker_id = $worker->id;
                $tag_worker->tag_id = $tag->id;
                $tag_worker->price = $request->input('price');
                $tag_worker->save();
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
        return view("worker.show")->with(compact('worker'));
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


            $worker = Worker::find($request->input('worker_id'));
            $sexyday = new DateTime($request->input('date')) ;
            $sexyday = $sexyday->format("l");

            $sexdate = new Sexdate();
            if(Auth::user()->role->name == "Admin"){
              $sexdate->client_id = Auth::user()->id;
            }else{
              $sexdate->client_id = Auth::user()->client->id;
            }
            $sexdate->worker_id = $request->input('worker_id');

            $sexdate->day = $request->input('days');
            $sexdate->start_hour = 0;
            $sexdate->end_hour = 0;
            $sexdate->hours = $request->input('hours');
            $sexdate->location = $request->input('location');
            $sexdate->observation = $request->input('observation');
            $sexdate->save();


            foreach($worker->tagsworkers as $tag){
                if ($request->has('tag_'.$tag->id)) {
                    $sexdate->tagsworkers()->attach($tag->id);
                }
            }


/*
            if (($worker->schedule->monday_active != 0) && ($sexyday == "Monday")) {

                $sexdate = new Sexdate();
                if(Auth::user()->role->name == "Admin"){
                  $sexdate->client_id = Auth::user()->id;
                }else{
                  $sexdate->client_id = Auth::user()->client->id;
                }
                $sexdate->worker_id = $request->input('worker_id');

                $sexdate->day = $request->input('days');
                $sexdate->start_hour = 0;
                $sexdate->end_hour = 0;
                $sexdate->hours = $request->input('hours');
                $sexdate->location = $request->input('location');
                $sexdate->observation = $request->input('observation');
                $sexdate->save();

                $worker = Worker::find($request->input('worker_id'));
                foreach($worker->tagsworkers as $tagsw){
                  if($tagsw->id == $request->input('tag_'.$tag->id))
                      $sexdate->tagsworkers()->attach($tagsw->id);
                }

            }
*/

            return redirect()->route($routeGenerator->make('sexdate', auth()->user()));

        }


          public function show_sexdate($id)
            {
                $addedprice = 0;
                $sexdate = Sexdate::find($id);
                foreach ($sexdate->tagsworkers as $tag) {
                $addedprice = $tag->price + $addedprice;
                }
                $totalprice = ($sexdate->hours * $addedprice);
                return view("sexdate.show")->with(compact('sexdate', 'totalprice'));
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
              $sexdates = Sexdate::all();
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
                $tag->description = $request->input('description');
                $tag->sessions = $request->input('sessions');
                $tag->hours = $request->input('hours');
                if ($request->input('normal') == True) {
                    $tag->normal = True;
                }
                if($request->input('sado') == True){
                    $tag->sado = True;
                }
                if($request->input('experience') == True){
                  $tag->experience = True;
                }
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
                $tag->description = $request->input('description');
                $tag->sessions = $request->input('sessions');
                $tag->hours = $request->input('hours');
                if ($request->input('normal') == True) {
                    $tag->normal = True;
                }else {
                  $tag->normal = False;
                }
                if($request->input('sado') == True){
                    $tag->sado = True;
                }else{
                  $tag->sado = False;
                }
                if($request->input('experience') == True){
                  $tag->experience = True;
                }else {
                  $tag->experience = False;
                }
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
