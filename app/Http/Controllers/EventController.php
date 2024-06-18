<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $query = Event::query();
    
        // Search by event name
        if ($request->has('search') && $request->input('search') !== null) {
            $search = $request->input('search');
            $query->where('name', 'like', '%' . $search . '%');
        }
    
        // Filter by event type
        if ($request->has('event_type') && $request->input('event_type') !== null) {
            $query->where('event_type', $request->input('event_type'));
        }
    
        // Sorting
        if ($request->has('sort_by') && $request->input('sort_by') !== null) {
            $sortBy = $request->input('sort_by');
            if (in_array($sortBy, ['date', 'name'])) {
                if ($sortBy == 'date') {
                    $query->orderBy('start_date', 'asc');
                } else {
                    $query->orderBy('name', 'asc');
                }
            }
        } else {
            // Default sorting by date
            $query->orderBy('start_date', 'asc');
        }
        
        // Paginate the results
        $events = $query->paginate(5);
    
        return response()->json($events);
    }

    public function getUniqueTypes()
    {
        $uniqueTypes = Event::select('event_type')->distinct()->get();
        return response()->json($uniqueTypes);
    }
    
}
