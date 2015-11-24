<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Es;
use Elasticsearch\Client;
class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function init($index_name,$mappings){
    //     $client = new Client();
    //     $indexParams['index'] = $index_name;
    //     // Index Settings
    //     $indexParams['body']['settings']['number_of_shards']   = 3;
    //     $indexParams['body']['settings']['number_of_replicas'] = 2;
    //     // $myTypeMapping = array (
    //     //     '_source' => array(
    //     //         'enabled'=>true
    //     //         ),
    //     //      'properties' => array(
    //     //         'first_name' => array(
    //     //             'type' => 'string',
    //     //             'analyzer' => 'vi_analyzer'
    //     //         ),
    //     //         'age' => array(
    //     //             'type' => 'integer'
    //     //         )
    //     //     )
    //     // );
    //     $myTypeMapping = $mappings;
    //     $indexParams['body']['mappings']['my_type'] = $myTypeMapping;
    //     // Create the index
    //     $result = $client->indices()->create($indexParams);
    // }
    public function createIndexMapping()
    {
        //Bo sung them hash tag neu can
        $mappingPost = array(
            "_source"=>array(
                'enabled'=>true
                ),
            'properties'=>array(
                'post_id'=>array(
                    'type'=>'long'
                    ),
                'description'=>array(
                    'type'=>'string',
                    'analyzer'=>'vi_analyzer',
                    ),
                )
            );
        $mappingBoard = array(
             "_source"=>array(
                'enabled'=>true
                ),
            'properties'=>array(
                'board_id'=>array(
                    'type'=>'long'
                    ),
                'title'=>array(
                    'type'=>'string',
                    'analyzer'=>'whitespace',
                    ),
                )
            );
        $mappingUser = array(
            "_source"=>array(
                'enabled'=>true
                ),
            'properties'=>array(
                'user_id'=>array(
                    'type'=>'long'
                    ),
                'username'=>array(
                    'type'=>'string',
                    'analyzer'=>'whitespace',
                    ),
                )
            );
        $client = new Client();
        $indexParams['index'] = "foodiee";
        // Index Settings
        $indexParams['body']['mappings']['post'] = $mappingPost;
        $indexParams['body']['mappings']['board'] = $mappingBoard;
        $indexParams['body']['mappings']['user'] = $mappingUser;
        $result = $client->indices()->create($indexParams);
        return $result;
    }
    public function view(Request $request){
        // $client = new Elasticsearch\Client();
        $result = $this->createIndexMapping();
        return response()->json($result);
    }
    public function searchBoard(){
        return response()->json(UserProfile::all());
    }
    public function searchPost(Request $request){
        $kw = $request->input('q');
        return $kw;
    }
    public function searchUser(){
        return 1;
    }
    public function indexBoard($boardName){
        return 1;
    }
    public function indexPost($description){
        return 1;
    }
    public function indexUser($userName){
        return 1;
    }
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
