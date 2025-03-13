namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckApiKey
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->header('X-API-KEY') !== 'mysecretkey') {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
