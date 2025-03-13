use App\Http\Controllers\CustomController;

Route::get('/custom', [CustomController::class, 'show']);

