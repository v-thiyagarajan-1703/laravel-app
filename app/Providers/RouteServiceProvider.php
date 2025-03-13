public function boot()
{
    parent::boot();

    $this->routes(function () {
        Route::middleware('web')
            ->group(base_path('routes/web.php'));

        // Load the custom route file
        Route::middleware('web')
            ->group(base_path('routes/custom.php'));
    });
}

