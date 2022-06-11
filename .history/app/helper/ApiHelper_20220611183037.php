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
        self::$response['message']=$message;
        self::$response['status']=$statusCode;
        self::$response['data']=$data;
       return response()->json(self::$response,self::$response['status']);
    }
}