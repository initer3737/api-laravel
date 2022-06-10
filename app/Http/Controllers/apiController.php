<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\api;
use Exception;
use App\Helper\ApiHelper;

class apiController extends Controller
{
    #to read data from db
    public function ApiIndex()
    { 
        $data=api::all();
        return ApiHelper::CreateApi("success", 200,$data);
    }
    #to read data from db by id
    public function ApiIndexId($id)
    { 
        $data=api::find($id);
        if(is_null($data)){
            $headers=['status'=>'404','message'=>"data not found"];
            return response()->json("not found!", 404, $headers);
        }
            return ApiHelper::CreateApi("success", 200,$data);
    }
    #to create data 
    
    public function ApiCreate(Request $request)
    {
        try {
            $validate=$request->validate([
                "name"=>['required','min:3','max:255'],
                "hobby"=>['required','min:3','max:255'],  
                "address"=>['required','min:3','max:255']
              ]);
                // if($validate->error()){
                //     $data=$validate->error()->get();
                //     $headers=["status"=>"ok!"];
                //     return response()->json($data, 200, $headers);
                // }

              $data=api::create($request->all());
              return ApiHelper::CreateApi( 'success',200,$data);  
        } catch (Exception $err) {
            //throw $th;
            return ApiHelper::CreateApi("internal server error!",500);
        }
    }

    #to update data to db
    public function ApiUpdate(Request $request , $id )
    {
        $data=api::find($id);
        if(is_null($data)){
            #if the data is null then
            $headers=[
                "status"=>"404 not found!",
                "message"=>"data with id $id not found!"
            ];
            return response()->json(["message"=>"data with id $id is not found!"], 201, $headers);
        }
        $data->update($request->all());
        $headers=["status"=>"ok!"];
        return response()->json(["message"=>"update successfully {$data}"], 201, $headers);
    }
    #to delete data to db
    public function ApiDelete($id)
    {
        $data=api::find($id);
        $data->delete();
        $headers=["status"=>"ok!"];
        if(is_null($data)){
            $headers=["status"=>"404!"];
            return response()->json(["message"=>"data not found"], 404, $headers);
        }
        return response()->json(["message"=>"deleted successfully"], 200, $headers);
    }
}
