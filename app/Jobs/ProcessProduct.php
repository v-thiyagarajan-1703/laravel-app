namespace App\Jobs;

use App\Models\Product;
use Illuminate\Bus\Queueable;

class ProcessProduct
{
    use Queueable;

    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function handle()
    {
        // Process the product (e.g., send notification)
    }
}
