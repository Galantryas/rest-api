<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Movie;
use App\Http\Resources\Movie as MovieResource;
// use DB;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get Movies
        $movies = Movie::paginate(15);

        //return collection of movies as a resource
        return MovieResource::collection($movies);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $movie = $request->isMethod('put') ? Movie::findOrFail
        ($request->movie_id) : new Movie;

        $movie->id = $request->input('movie_id');
        $movie->judul = $request->input('judul');
        $movie->jenis = $request->input('jenis');
        $movie->sinopsis = $request->input('sinopsis');
        $movie->pemain = $request->input('pemain');
        $movie->produser = $request->input('produser');
        $movie->sutradara = $request->input('sutradara');
        $movie->penulis = $request->input('penulis');
        $movie->produksi = $request->input('produksi');
        $movie->poster = $request->input('poster');
        $movie->trailer = $request->input('trailer');
        $movie->umur = $request->input('umur');
        $movie->rating = $request->input('rating');
        $movie->durasi = $request->input('durasi');
        $movie->jadwal = $request->input('jadwal');

        if($movie->save()){
            return new MovieResource($movie);

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Get single movie
        $movie = Movie::findOrFail($id);

        //Return single movie as resource
        return new MovieResource($movie);
    }

    // public function showPoster($id)
    // {
    //     // dd($id);
    //     //Get single movie
    //     // $movie = DB::table('movies')->select('poster')->where('id',$id)->first();
    //     //Return single movie as resource
    //     return new MovieResource($movie);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Get single movie
        $movie = Movie::findOrFail($id);

        if($movie->delete()){
            return new MovieResource($movie);
        }
    }
}
