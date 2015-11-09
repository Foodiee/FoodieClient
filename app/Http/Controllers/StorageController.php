<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\Response;

use App\Http\Requests;
// use App\Http\Response;
use App\Http\Controllers\Controller;
use Storage;
use Auth;
class StorageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if(!Auth::check() )
            return response()->json("Please login");
        //convert string to integer, N2 is unsigned long, big-endian
        $input_name = unpack('N2',hash("md5",$request->file('src')->getClientOriginalName()))[1]&0xFFFFFFFF;
        Storage::put(
            Auth::user()->user_id."/".$input_name,
            // "11/".$input_name,
            file_get_contents($request->file('src')->getRealPath())
        );
        return response()->json($input_name);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $file_name = Auth::user()->user_id."/".$id;
        try {
            $file = Storage::get($file_name);
            $file_type = Storage::mimeType($file_name);
            // $file_extension = Storage::extension($file_name);
            return (new Response($file,200))->header('Content-Type',$file_type);
        } catch (Exception $ex)
        {
            return response()->json($ex->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
