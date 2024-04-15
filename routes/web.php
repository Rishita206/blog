<?php

use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashbordController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\user\CommentControler;
use App\Http\Controllers\user\UserCategoryController;
use App\Http\Controllers\User\UserpostController;
use App\Http\Controllers\vist\VisitCategoryController;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Symfony\Component\HttpKernel\Profiler\Profile;








use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/





//visitor
// Route::get('/blog', function () {
//    return view('visitor.page');
// });








// <-----------------------------Admin Side------------------------------->

//auth

Auth::routes();


Route::middleware('auth', 'verified')->group(function () {
   Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
   Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
   Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'authenticate']);

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {

   Route::get('/dashboard', [App\Http\Controllers\admin\DashbordController::class, 'index'])->name('dashboard');
});

//User

Route::get('/user/index', [UserController::class, 'index'])->name('user.index');
Route::get('/user/edit/{id?}', [UserController::class, 'edit'])->name('user.edit');
Route::post('/user/update', [UserController::class, 'update'])->name('user.update');
Route::get('/user/delete/{id?}', [UserController::class, 'delete'])->name('user.delete');


//category

Route::get('/category/index', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/edit/{id?}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category/update', [CategoryController::class, 'update'])->name('category.update');
Route::get('/category/delete/{id?}', [CategoryController::class, 'delete'])->name('category.delete');

//post

Route::get('/postall', [PostController::class, 'index'])->name('post.index');
Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
Route::get('/post/edit/{id?}', [PostController::class, 'edit'])->name('post.edit');
Route::post('/post/update', [PostController::class, 'update'])->name('post.update');
Route::get('/post/delete/{id?}', [PostController::class, 'delete'])->name('post.delete');









require __DIR__ . '/auth.php';




// <------------------------------------- User Side------------------------------------->

//User Post
Route::get('/homepage',[UserpostController::class,'blog'])->name('user.home');

Route::get('/post/user', [UserpostController::class, 'postpage'])->name('post.user');
Route::get('/create', [UserpostController::class, 'create'])->name('create');
Route::get('/index', [UserpostController::class, 'index'])->name('index');
Route::post('/store', [UserpostController::class, 'store'])->name('store');
Route::get('/edit/{id?}', [UserpostController::class, 'edit'])->name('edit');
Route::get('/delete/{id?}', [UserpostController::class, 'delete'])->name('delete');
Route::post('/update', [UserpostController::class, 'update'])->name('update');
Route::get('/mypost',[UserpostController::class,'mypost'])->name('mypost');
Route::get('/mydelete/{id?}',[UserpostController::class,'postdelete'])->name('postdelete');
Route::get('/myedit/{id?}',[UserpostController::class,'postedit'])->name('postedit');
Route::get('/c/{id?}',[UserpostController::class,'showcat'])->name('show.cat');

Route::get('/', function () {
   // //  return view('admin.home');
   // $categories = Category::all();
   // //  $categories = Category::find($id);
   return view('visitor.page');
});

//fetching blog data with the help of category
Route::get('/cat/{id?}', [VisitCategoryController::class, 'show'])->name('post.view');

//comment
Route::post('comment', [CommentControler::class, 'store'])->name('comment.store');

Route::get('/comment/delete/{id?}', [CommentControler::class, 'delete'])->name('comment.delete');

Route::get('/visitpost',[VisitCategoryController::class,'post'])->name('postview');

Route::get('/visitcom/{id?}',[VisitCategoryController::class,'comment'])->name('comview');