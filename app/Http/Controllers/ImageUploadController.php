<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Postimage;

use Illuminate\Support\Facades\File;

class ImageUploadController extends Controller
{
    //Add image
    public function addImage(){
      return view('Image.add_image');
    }
    
    //Store image
    public function storeImage(Request $request){
      $data= new Postimage();

      if($request->file('image')){
          $file= $request->file('image');
          $filename= date('YmdHi').$file->getClientOriginalName();
          $file-> move(public_path('public/Image'), $filename);
          $data['image']= $filename;
      }
      
      $data->save();

      return redirect()->route('images.view');
    }

		//View image
    public function viewImage(){
      // return view('view_image');
      $imageData= Postimage::all();
      return view('Image.view_image', compact('imageData'));
    }

    public function deleteImage($id){
      $Image = Postimage::findOrFail($id);
      $image_path = 'public/Image/'.$Image->image;
      
      if(File::exists($image_path)) {
        File::delete($image_path);
      }

      $Image->delete();
      
      return redirect()->route('images.view');
    }
}