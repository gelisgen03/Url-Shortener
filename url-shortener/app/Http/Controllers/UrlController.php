<?php
namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UrlController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function store(Request $request)
    {
        $request->validate([
            'original_url' => 'required|url'
        ]);

        $original_url = $request->input('original_url');

        // Check if URL already exists
        $url = Url::where('original_url', $original_url)->first();
        if ($url) {
            return view('index')->with('short_url', url($url->short_code));
        }

        // Generate a unique short code
        $short_code = $this->generateUniqueShortCode();

        // Save to the database
        $url = Url::create([
            'original_url' => $original_url,
            'short_code' => $short_code,
        ]);

        return view('index')->with('short_url', url($short_code));
    }

    public function show($short_code)
    {
        $url = Url::where('short_code', $short_code)->firstOrFail();
        return redirect($url->original_url);
    }

    private function generateUniqueShortCode()
    {
        do {
            $short_code = Str::random(12);
        } while (Url::where('short_code', $short_code)->exists());

        return $short_code;
    }
}

