protected $listen = [
    \App\Events\ProductCreated::class => [
        \App\Listeners\SendProductCreatedNotification::class,
    ],
];
