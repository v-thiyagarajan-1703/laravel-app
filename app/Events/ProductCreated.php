namespace App\Events;

use App\Models\Product;
use Illuminate\Foundation\Events\Dispatchable;

class ProductCreated
{
    use Dispatchable;

    public $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }
}
