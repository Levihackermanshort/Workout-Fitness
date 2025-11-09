<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ActivityController extends Controller
{
    /**
     * Display a listing of the activities with pagination and search.
     */
    public function index(Request $request): View
    {
        $query = Activity::query()->orderBy('date', 'desc')->orderBy('time_start', 'desc');

        // Search functionality (extra credit)
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('activity', 'like', "%{$search}%")
                  ->orWhere('note', 'like', "%{$search}%");
            });
        }

        // Pagination (extra credit)
        $activities = $query->paginate(10)->withQueryString();

        return view('activities.index', compact('activities'));
    }

    /**
     * Show the form for creating a new activity.
     */
    public function create(): View
    {
        return view('activities.create');
    }

    /**
     * Store a newly created activity in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validation (extra credit)
        $validated = $request->validate([
            'date' => 'required|date',
            'time_start' => 'nullable|date_format:H:i',
            'time_end' => 'nullable|date_format:H:i|after_or_equal:time_start',
            'activity' => 'required|string|max:255',
            'time_spent' => 'nullable|string|max:50',
            'distance' => 'nullable|string|max:50',
            'set_count' => 'nullable|integer|min:0',
            'reps' => 'nullable|integer|min:0',
            'note' => 'nullable|string',
        ], [
            'date.required' => 'The date field is required.',
            'date.date' => 'The date must be a valid date.',
            'time_end.after_or_equal' => 'The end time must be after or equal to the start time.',
            'activity.required' => 'The activity name is required.',
            'activity.max' => 'The activity name may not be greater than 255 characters.',
        ]);

        Activity::create($validated);

        return redirect()->route('activities.index')
            ->with('success', 'Activity created successfully.');
    }

    /**
     * Display the specified activity.
     */
    public function show(Activity $activity): View
    {
        return view('activities.show', compact('activity'));
    }

    /**
     * Show the form for editing the specified activity.
     */
    public function edit(Activity $activity): View
    {
        return view('activities.edit', compact('activity'));
    }

    /**
     * Update the specified activity in storage.
     */
    public function update(Request $request, Activity $activity): RedirectResponse
    {
        // Validation (extra credit)
        $validated = $request->validate([
            'date' => 'required|date',
            'time_start' => 'nullable|date_format:H:i',
            'time_end' => 'nullable|date_format:H:i|after_or_equal:time_start',
            'activity' => 'required|string|max:255',
            'time_spent' => 'nullable|string|max:50',
            'distance' => 'nullable|string|max:50',
            'set_count' => 'nullable|integer|min:0',
            'reps' => 'nullable|integer|min:0',
            'note' => 'nullable|string',
        ], [
            'date.required' => 'The date field is required.',
            'date.date' => 'The date must be a valid date.',
            'time_end.after_or_equal' => 'The end time must be after or equal to the start time.',
            'activity.required' => 'The activity name is required.',
            'activity.max' => 'The activity name may not be greater than 255 characters.',
        ]);

        $activity->update($validated);

        return redirect()->route('activities.index')
            ->with('success', 'Activity updated successfully.');
    }

    /**
     * Remove the specified activity from storage.
     */
    public function destroy(Activity $activity): RedirectResponse
    {
        $activity->delete();

        return redirect()->route('activities.index')
            ->with('success', 'Activity deleted successfully.');
    }

    /**
     * Search activities by date or keyword (extra credit).
     */
    public function search(Request $request): View
    {
        $query = Activity::query()->orderBy('date', 'desc')->orderBy('time_start', 'desc');

        if ($request->has('search_date') && $request->search_date) {
            $query->where('date', $request->search_date);
        }

        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('activity', 'like', "%{$search}%")
                  ->orWhere('note', 'like', "%{$search}%");
            });
        }

        $activities = $query->paginate(10)->withQueryString();
        $searchDate = $request->search_date ?? '';
        $searchTerm = $request->search ?? '';

        return view('activities.search', compact('activities', 'searchDate', 'searchTerm'));
    }
}
