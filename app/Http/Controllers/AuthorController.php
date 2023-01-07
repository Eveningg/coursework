<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\File;
use App\Models\Settings;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AuthorController extends Controller
{
    public function index(Request $request){
        return view('back.pages.home');
    }

    public function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('author.login');
    }

    public function changeProfilePicture(Request $request){
        $user = User::find(auth('web')->id());
        $path = 'back/dist/img/authors/';
        $file = $request->file('file');
        $old_picture = $user->getAttributes()['picture'];
        $file_path = $path.$old_picture;
        $new_picture_name = "AIMG".$user->id.time().rand(1,100000).'.jpg';

        if($old_picture != null && File::exists(public_path($file_path))){
            File::delete(public_path($file_path));
        }
        $upload = $file->move(public_path($path), $new_picture_name);
        if($upload){
            $user->update([
                'picture'=>$new_picture_name
            ]);
            return response()->json(['status'=>1, 'msg'=>'Your Profile Picture has Successfully Updated!']);
        }else{
            return response()->json(['status'=>0, 'Something Went Wrong!']);
        }
    }

    public function createPost(Request $request){
        $request->validate([
            'post_title'=>'required|unique:posts,post_title',
            'post_content'=>'required',
            'post_category'=>'required|exists:sub_categories,id',
            'featured_image'=>'required|mimes:jpeg,jpg,png|max:1024',
        ]);

        if($request->hasFile('featured_image')){
            $path = "images/post_images/";
            $file = $request->file('featured_image');
            $filename = $file->getClientOriginalName();
            $new_filename = time().'_'.$filename;

            $upload = Storage::disk('public')->put($path.$new_filename, (string) file_get_contents($file));

            $post_thumbnails_path = $path.'thumbnails';
            if( !Storage::disk('public')->exists($post_thumbnails_path) ){
                Storage::disk('public')->makeDirectory($post_thumbnails_path, 0755, true, true);
            }

            //Creates a Square Image - Extension of the Image Intervention Plugin
            Image::make( storage_path('app/public/'.$path.$new_filename) )
                  ->fit(200, 200)
                  ->save( storage_path('app/public/'.$path.'thumbnails/'.'thumb_'.$new_filename) );

            //Creates a Resized Image - Extension of the Image Intervention Plugin
            Image::make( storage_path('app/public/'.$path.$new_filename) )
                  ->fit(500, 350)
                  ->save( storage_path('app/public/'.$path.'thumbnails/'.'resized_'.$new_filename) );
                  
            if( $upload ){
                 $post = new Post();
                 $post->author_id = auth()->id();
                 $post->category_id = $request->post_category;
                 $post->post_title = $request->post_title;
                 $post->post_content = $request->post_content;
                 $post->featured_image = $new_filename;
                 $saved = $post->save();

                 if($saved){
                    return response()->json(['code'=>1, 'msg'=>'New post has been successfully created.']);
                 }else{
                    return response()->json(['code'=>3, 'msg'=>'Something went wrong ins saving post data.']);
                 }
            }else{
                return response()->json(['code'=>3,'msg'=>'Something went wrong for uploading featured image.']);
            }
        }
    }
}
