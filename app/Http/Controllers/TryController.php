<?php

namespace App\Http\Controllers;

use App\Department;
use App\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class TryController extends Controller
{
    public static function getNewSizeFromImage($folder, $image, $size_width, $size_height){
        //جلب الصور في مقاس معين
        $main_path = 'public/';
        if(!file_exists($folder.'/'.$image)){
            return '';
        }

        if(($size_width<1) && ($size_height<1)){
            //اذا لم يكن هناك عرض او ارتفاع فانه يرجع الصورة نفسها
            return $image;
        }

        $file_name_only = pathinfo($image, PATHINFO_FILENAME);
        $file_extension = strtolower(pathinfo($image, PATHINFO_EXTENSION));


        $thumb_folder = $image;
        $thumb_folder = str_replace($file_name_only.'.'.$file_extension, '', $thumb_folder);
        $thumb_folder .= 'thumbs';

        if(!file_exists($folder.'/'.$thumb_folder)){
            try{

                mkdir($folder.'/'.$thumb_folder);
            }catch (\Exception $exception){
                Storage::disk('public_uploads')->makeDirectory($folder.'/'.$thumb_folder);
            }
        }


        $new_file = str_replace($file_name_only.'.'.$file_extension, $file_name_only.'_'.$size_width.'_'.$size_height.'.'.$file_extension,$image);

        $new_file = $thumb_folder.'/'.$file_name_only.'_'.$size_width.'_'.$size_height.'.'.$file_extension;

        if(file_exists($folder.'/'.$new_file)){
            //اذا كان الملف الذي بالمقاس الجديد موجود من قبل فانه يسترجعه فقط
            return  '/'.$folder.'/'.$new_file;
        }

        //اذا لم يكن موجود فانه يقوم بإنشائه
        if(($size_width>0) && ($size_height>0)){
            Image::make($folder.'/'.$image)
                ->resize($size_width, $size_height)
                ->save( $folder.'/'.$new_file);
        } else if ($size_width>0){
            Image::make($folder.'/'.$image)
                ->resize($size_width, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save( $folder.'/'.$new_file);
        } else if ($size_height>0){
            Image::make($folder.'/'.$image)
                ->resize(null, $size_height, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save( $folder.'/'.$new_file);
        }

        return  '/'.$folder.'/'.$new_file;

    }

   
}
