<?php 
namespace App\Helper;

class ApiHelper{
    protected static $response=[
        "meta"=>[
            "code"=>"",
            "message"=>null,
            "status"=>null
        ],
        "data"=>null
    ];
    static public function CreateApi($message=null,$statusCode=null,$data=null)
    {
        self::$response['meta']['message']=$message;
        self::$response['meta']['status']=$statusCode;
        self::$response['data']=$data;
       return response()->json(self::$response,self::$response['status']);
    }

    static public function onSuccessApi($message="success",$statusCode=200,$data=null)
    {
        self::$response['meta']['message']=$message;
        self::$response['meta']['status']=$statusCode;
        self::$response['data']=$data;
       return response()->json(self::$response,self::$response['status']);
    }

    static public function onErrorApi($message=null,$statusCode=500,$data=null)
    {
        self::$response['meta']['message']=$message;
        self::$response['meta']['status']=$statusCode;
        self::$response['data']=$data;
       return response()->json(self::$response,self::$response['status']);
    }
}