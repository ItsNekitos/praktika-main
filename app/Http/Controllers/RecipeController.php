<?php

namespace App\Http\Controllers;


use App\Http\Requests\RecipeAddRequest;
use App\Http\Requests\RecipeEditRequest;
use App\Http\Requests\UserLoginRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Inertia\Testing\Concerns\Has;

class RecipeController extends Controller
{
    public function postadd(RecipeAddRequest $request){
        $post = new Recipe();
        $post->user_id = Auth::id();
        $post->name = $request->name;
        $post->subtitle = $request->subtitle;
        $post->anons = $request->anons;
        $post->contentt = $request->contentt;
        $path = Storage::disk("public")->putFile('/photos', $request->file("photo"));
        $post->photo = $path;
        $post->save();
        return response()->json(["id"=>$post->id]);
    }
    public function recipe($recipe){
        $recipe = Recipe::findOrFail($recipe);
        $isAdmin = false;
        if(Auth::check()){
            if(Auth::user()->id==$recipe->user_id||Auth::user()->role=='admin'){
                $isAdmin = true;
            }
        }
        return response()->json(['recipe'=>$recipe, 'isAdmin'=>$isAdmin]);
    }
    public function postedit(RecipeEditRequest $request, Recipe $post){
        $post->name = $request->name;
        $post->subtitle = $request->subtitle;
        $post->anons = $request->anons;
        $post->contentt = $request->contentt;
        if ($request->has("photo")){
            $path = Storage::disk("public")->putFile('/photos', $request->file("photo"));
            $post->photo = $path;
        }
        $post->save();
        return response()->json(["id"=>$post->id]);
    }
    public function postsUser(User $user){
        return Recipe::where("user_id",$user->id)->get();
    }
    public function recipesHome(){
        return response()->json(["recipes"=>Recipe::with('category'), "categories"=>Category::all()]);
    }
}