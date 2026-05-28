<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function(){
    Route::get('/user', function(Request $request){
        return $request->user();
    });
    Route::get("/postUser/{post}", [RecipeController::class, "post"]);
    Route::post("/postadd", [RecipeController::class, "postadd"]);
    Route::post("/postedit/{post}", [RecipeController::class, "postedit"]);
    Route::post("/logout", [AuthController::class, "logout"]);
});
Route::get("/recipe/{recipe}", [RecipeController::class, "recipe"]);
Route::get("/postsUser/{user}", [RecipeController::class, "postsUser"]);
Route::get("/recipesHome", [RecipeController::class, "recipesHome"]);
Route::post("/register", [AuthController::class, "register"]);
Route::post("/login", [AuthController::class, "login"]);