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
            return ApiHelper::onSuccessApi("success", 200,$data);
        } catch (Exception $err) {
            //throw $th;
            return ApiHelper::onErrorApi("internal server error!",500);
        }
    }
    #to read data from db by id
    public function ApiIndexId($id)
    { 
        try {
            $data=api::find($id);
            if(is_null($data)){
                return ApiHelper::onErrorApi("404 not found", 404);
            }
                return ApiHelper::onSuccessApi("success", 200,$data);
        } catch (Exception $err) {
            //throw $th;
            return ApiHelper::onErrorApi("internal server error!",500);
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
                validator::make()
              $data=api::create($request->all());
              return ApiHelper::onSuccessApi( 'success!',201,$data);  
        } catch (Exception $err) {
            //throw $th;
            return ApiHelper::onErrorApi("internal server error!",500);
        }
    }

    #to update data to db
    public function ApiUpdate(Request $request , $id )
    {
        try{
            $data=api::find($id);
            if(is_null($data)){
                #if the data is null then
                return  ApiHelper::onErrorApi("data not found!", 404);
            }
            $data->update($request->all());
            return ApiHelper::onSuccessApi("update successfully", 201,$data);
        } catch (Exception $err) {
        //throw $th;
            return ApiHelper::onErrorApi("internal server error!",500);
        }
    }
    #to delete data to db
    public function ApiDelete($id)
    {
       try {
            $data=api::find($id);
            $data->delete();
            if(is_null($data)){
                return ApiHelper::onErrorApi("data not found!", 404);;
            }
            return ApiHelper::onSuccessApi("delete successfully!", 200);
    } catch (Exception $err) {
        //throw $th;
            return ApiHelper::onErrorApi("internal server error!",500);
        }
    }
}
