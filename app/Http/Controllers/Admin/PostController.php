<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Postomat;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Postomat::all();
        return view('admin.post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Postomat();
        $post->address = $request->address;
        $post->qr_code = $request->qrcode;
        $post->lng = $request->lng;
        $post->lat = $request->lat;
        $post->slot = $request->slot;
        $post->freeslot = $request->freeslot;
        $post->save();
        //$2y$10$4ksY5JZ9Ol1rUOtYTGrW/eUcIzY5ArmRVNIYR6xHgKUc6kPTJoWj.
        return redirect()->back()->withSuccess('Постомат было успешно добавлено!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Postomat  $postomat
     * @return \Illuminate\Http\Response
     */
    public function show(Postomat $postomat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Postomat  $postomat
     * @return \Illuminate\Http\Response
     */
    public function edit(Postomat $postomat)
    {
        return view('admin.post.edit', ['postomat' => $postomat]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Postomat  $postomat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Postomat $postomat)
    {
        $postomat->address = $request->address;
        $postomat->qr_code = $request->qrcode;
        $postomat->lat = $request->lat;
        $postomat->lng = $request->lng;
        $postomat->freeslot = $request->freeslot;
        $postomat->slot = $request->slot;
        $postomat->save();
        return redirect()->back()->withSuccess('Постомат было успешно обновлено!');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Postomat  $postomat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Postomat $postomat)
    {
        $postomat->delete();
        return redirect()->back()->withSuccess('Постомат было успешно удалено!');
    
    }
}
