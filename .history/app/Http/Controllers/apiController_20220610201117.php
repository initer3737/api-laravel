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
        try {
            $data=api::all();
            return ApiHelper::CreateApi("success", 200,$data);
        } catch (Exception $err) {
            //throw $th;
            return ApiHelper::CreateApi("internal server error!",500);
        }
    }
    #to read data from db by id
    public function ApiIndexId($id)
    { 
        try {
            $data=api::find($id);
            if(is_null($data)){
                return ApiHelper::CreateApi("404 not found", 404);
            }
                return ApiHelper::CreateApi("success", 200,$data);
        } catch (Exception $err) {
            //throw $th;
            return ApiHelper::CreateApi("internal server error!",500);
        }
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
                if($validate->getMessa){
                    $data=$validate->error()->get();
                    $headers=["status"=>"ok!"];
                    return response()->json($data, 200, $headers);
                }

              $data=api::create($request->all());
              return ApiHelper::CreateApi( 'success',201,$data);  
        } catch (Exception $err) {
            //throw $th;
            return ApiHelper::CreateApi("internal server error!",500);
        }
    }

    #to update data to db
    public function ApiUpdate(Request $request , $id )
    {
        try{
            $data=api::find($id);
            if(is_null($data)){
                #if the data is null then
                return  ApiHelper::CreateApi("data not found!", 404);
            }
            $data->update($request->all());
            return ApiHelper::CreateApi("update successfully", 201,$data);
        } catch (Exception $err) {
        //throw $th;
            return ApiHelper::CreateApi("internal server error!",500);
        }
    }
    #to delete data to db
    public function ApiDelete($id)
    {
       try {
            $data=api::find($id);
            $data->delete();
            if(is_null($data)){
                return ApiHelper::CreateApi("data not found!", 404);;
            }
            return ApiHelper::CreateApi("delete successfully!", 200);
    } catch (Exception $err) {
        //throw $th;
            return ApiHelper::CreateApi("internal server error!",500);
        }
    }
}