<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Http\Controllers\Controller;

class PropertyController extends Controller
{
    public function index(Request $request) {
        try {
            $query = Property::where('sold', false)->where('for_sale', true);

        if ($request->has('title')) {
            $query->where('title', 'LIKE', "%{$request->title}%");
        }

        if ($request->has('sort_by')) {
            $query->orderBy($request->sort_by, $request->order ?? 'asc');
        }

        return response()->json($query->paginate(25));
        } catch (\Throwable $e) {
            return response()->json([
                'error' => 'Failed to retrieve properties.',
                'message' => $e->getMessage()
            ], 500);
        }
        
    }
    public function getByProvince($province, Request $request)
    {
        try {
            $query = Property::where('sold', false)
                         ->where('for_sale', true)
                         ->where('province', 'LIKE', "%{$province}%");

        if ($request->has('title')) {
            $query->where('title', 'LIKE', "%{$request->title}%");
        }

        if ($request->has('sort_by')) {
            $query->orderBy($request->sort_by, $request->order ?? 'asc');
        }

        if ($query->isEmpty()) {
            return response()->json(['error' => 'Province not found'], 404);
        }

        return response()->json($query->paginate(25));
        } catch (\Throwable $e) {
            return response()->json([
                'error' => 'Failed to retrieve properties.',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
