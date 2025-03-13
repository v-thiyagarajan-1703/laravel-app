protected $listen = [
    ProductCreated::class => [
        SendProductCreatedNotification::class,
    ],
];
