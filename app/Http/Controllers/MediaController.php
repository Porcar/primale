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


class MediaController extends Controller
{

  public function media()
  {
      $media = Media::all();
      return view('media.media_list')->with(compact('medias'));
  }

  public function image_create($id)
  {
      $worker = Worker::find($id);
      return view("media.create_image")->with(compact('worker'));
  }

  public function create_image(Request $request, RouteGeneratorService $routeGenerator)
  {
    $worker = Worker::find($request->input('worker_id'));
    $media = new Media();
    $media->worker_id = $request->input('worker_id');
    if ($request->file('image')) {
        if ($request->file('image')->isValid())
        {
            $destinationPath = base_path() . '/public/img/';
            $image_name = $request->file('image')->getClientOriginalName();
            $image = $request->file('image')->move($destinationPath, $image_name);
            $image_name = $image->getBasename();
            $media->image = "img/".$image_name;
        }
    }


    $media->save();
    return redirect()->route($routeGenerator->make('worker.show', auth()->user()), $worker->id);

  }

  public function video_create($id)
  {
      $worker = Worker::find($id);
      return view("media.create_video")->with(compact('worker'));
  }

  public function create_video(Request $request, RouteGeneratorService $routeGenerator)
  {

    $worker = Worker::find($request->input('worker_id'));
    $media = new Media();
    $media->worker_id = $request->input('worker_id');
    $media->video = $this->YoutubeID($request->input('video'));
    $media->save();

    return redirect()->route($routeGenerator->make('worker.show', auth()->user()),$worker->id);

  }


  public function delete($id, RouteGeneratorService $routeGenerator)
  {
      $media = Media::find($id);
      $media->delete();

      return redirect()->route($routeGenerator->make('worker.show', auth()->user()));
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

}
