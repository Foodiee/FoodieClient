<?php

namespace App\Http\Controllers;

use App\Models\Storage;
use Illuminate\Http\Request;

use Illuminate\Http\Response;
use GuzzleHttp\Client;
use App\Http\Requests;
use Auth;
// use App\Http\Response;
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
//        $input_name = unpack('N2',hash("md5",$request->file('src')->getClientOriginalName()))[1]&0xFFFFFFFF;
//        Storage::put(
//           $input_name,
//            file_get_contents($request->file('src')->getRealPath())
//        );
//        $image = Image::make(storage_path('app').'/'.$input_name);
//        $image->resize(75,75);
//        $image->save(storage_path('app')."/".$input_name.'_75');
//        return response()->json($input_name);
//        $file_name = $request->file('src')->getClientOriginalName();
        $photo_link = StorageController::send_photo_to_storage($request->file('src'));
        return response()->json($photo_link);
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
//        $file_name = Auth::user()->user_id."/".$id;
        try {
            $url = sprintf("%s/%s",env('STORAGE_SERVICE','localhost'),$id);
            $file = file_get_contents($url);
            $file_type = 'image/jpeg';
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
    public static function getFile($id,$url){
        $file_name = unpack('N2',hash("md5",$url))[1]&0xFFFFFFFF;
        $file = file_get_contents($url);
        Storage::put($file_name,$file);
        return $file_name;
    }
    public static function send_photo_to_storage($file){
        $client = new Client();
        $storage_service_url = sprintf("%s/%s",env('STORAGE_SERVICE','localhost'),'upload');
        $body = fopen($file->getRealPath(),'r');
        $res = $client->request('POST',
            $storage_service_url, [
                'multipart'=>[
                    [
                        'name'=>'file',
                        'contents'=>$body
                    ]
                ]]
            );
        $response = (string)json_decode($res->getBody()->getContents(),true)['link'];
        $link = explode("/",$response)[1];
        return $link ;
//        $res = $client->post();
    }
}
