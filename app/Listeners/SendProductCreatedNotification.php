namespace App\Listeners;

use App\Events\ProductCreated;
use Illuminate\Support\Facades\Log;

class SendProductCreatedNotification
{
    public function handle(ProductCreated $event)
    {
        Log::info('New product created: ' . $event->product->name);
    }
}
