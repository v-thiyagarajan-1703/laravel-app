namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Events\ProductCreated;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    public function store(Request $request)
    {
        // Validate Request
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string'
        ]);

        // Create Product
        $product = Product::create($request->all());

        // Dispatch Event
        event(new ProductCreated($product));

        return response()->json([
            'message' => 'Product created successfully',
            'product' => $product
        ], 201);
    }
}
