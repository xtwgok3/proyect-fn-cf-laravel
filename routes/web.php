<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OauthController;
use App\Http\Controllers\UserProfileController; // controlador para el perfil de usuario
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\NoticeInvoiceCreated;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\Auth\ResetPassword;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;


use App\Http\Controllers\ChatController;

Route::post('/chat/response', [ChatController::class, 'getResponse']);
//Route::get('/chat/history', [ChatController::class, 'getHistory']);





// Ruta para manejar la solicitud de restablecimiento de contraseña
Route::get('/forgot-password', function () {
  return view('auth.forgot-password');
})->name('password.request');

// Ruta para manejar la solicitud de restablecimiento de contraseña
Route::post('/forgot-password', function (Request $request) {
  $request->validate(['email' => 'required|email']);

  $status = Password::sendResetLink(
      $request->only('email')
  );

  return $status === Password::RESET_LINK_SENT
      ? back()->with(['status' => __($status)])
      : back()->withErrors(['email' => __($status)]);
})->name('password.email');

// Ruta para manejar la respuesta de restablecimiento de contraseña      FIN

Auth::routes();
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
  Route::get('callback/{order:uuid}', [OrderController::class, 'callback'])->name('config');

  Route::post('add-to-cart/{product}', [ShoppingCartController::class, 'store']);
  Route::get('checkout', [ShoppingCartController::class, 'index'])->name('checkout');
  Route::delete('add-to-cart/remove/{id}', [ShoppingCartController::class, 'remove'])->name('cart.remove'); ///elimina producto del carrito

  Route::get('download/{order}', [InvoiceController::class, 'download'])->name('invoice.download');
  Route::resource('invoices', InvoiceController::class)->only(['index', 'store']);

  Route::resource('orders', OrderController::class)->only('store');

// perfil de usuario
  Route::get('/user/profile', [UserProfileController::class, 'show'])->name('profile.show');
  Route::post('/user/profile', [UserProfileController::class, 'update'])->name('profile.update');
  Route::post('/profile/delete-photo', [UserProfileController::class, 'deletePhoto'])->name('profile.deletePhoto');
  Route::get('/user/profile/clear-session', function () {session()->forget(['error', 'success']);return redirect()->back();})->name('clear.session');

});

  // Rutas protegidas para categorías
Route::group(['middleware' => ['admin']], function () {
  Route::resource('products', ProductController::class);
  
  Route::get('/categories', [ProductController::class, 'listCategories'])->name('categories.index');
  Route::get('/categories/create', [ProductController::class, 'createCategory'])->name('categories.create');
  Route::post('/categories', [ProductController::class, 'storeCategory'])->name('categories.store');
  Route::get('/categories/{category}/edit', [ProductController::class, 'editCategory'])->name('categories.edit');
  Route::put('/categories/{category}', [ProductController::class, 'updateCategory'])->name('categories.update');
  Route::delete('/categories/{category}', [ProductController::class, 'destroyCategory'])->name('categories.destroy');
});


Route::get('redirect/github', [OauthController::class, 'redirectGithub']);
Route::get('auth/callback', [OauthController::class, 'callback']);

Route::post('webhook', function () {
  return response()->json(['status' => 'ok']);
});;

Route::get('send-mail/{user}', function (User $user) {
  Mail::to($user)->send(new NoticeInvoiceCreated($user));
  return 'Mail sent';
});


Route::post('webhook', function () {

  $request = request();

  $request->file('image')->store('profile_pictures', 'avatars');

  return response()->json([
    'status' => [
      'code' => 'ok'
    ]
  ]);
});;
