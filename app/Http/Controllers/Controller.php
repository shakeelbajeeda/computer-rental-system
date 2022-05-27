<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use File;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function send_response ($status, $response, $key = "") {
        echo json_encode(array('status' => $status, 'response' => $response, 'key' => $key));
    }

    public function upload_file($img_file,$folder_name)
    {

       $imgpath = 'public/images/'.$folder_name;
       File::makeDirectory($imgpath, $mode = 0777, true, true);
       $imgDestinationPath = $imgpath.'/';
       $file_name = time()."_".$img_file->getClientOriginalName();
       $success = $img_file->move($imgDestinationPath, $file_name);
       return($file_name);
     }

     public function remove_file($filename,$folder)
    {
        if (file_exists(public_path('public/images/'.$folder.'/' . $filename))) {
                    unlink(public_path('public/images/'.$folder.'/' . $filename));
         }
    }
}
