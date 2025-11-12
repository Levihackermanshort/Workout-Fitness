<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
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

        // Search functionality (extra credit) - works with pagination
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('activity', 'like', "%{$search}%")
                  ->orWhere('note', 'like', "%{$search}%")
                  ->orWhere('date', 'like', "%{$search}%");
            });
        }

        // Pagination (extra credit) - complex pagination with page numbers
        $activities = $query->paginate(10)->withQueryString();
        
        // Get total count for search feedback
        $totalCount = $activities->total();

        return view('activities.index', compact('activities', 'totalCount'));
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
     * Uses Form Request for validation (extra credit).
     */
    public function store(StoreActivityRequest $request): RedirectResponse
    {
        Activity::create($request->validated());

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
     * Uses Form Request for validation (extra credit).
     */
    public function update(UpdateActivityRequest $request, Activity $activity): RedirectResponse
    {
        $activity->update($request->validated());

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
     * Enhanced search with result count and pagination support.
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
                  ->orWhere('note', 'like', "%{$search}%")
                  ->orWhere('date', 'like', "%{$search}%");
            });
        }

        $activities = $query->paginate(10)->withQueryString();
        $searchDate = $request->search_date ?? '';
        $searchTerm = $request->search ?? '';
        $totalCount = $activities->total();

        return view('activities.search', compact('activities', 'searchDate', 'searchTerm', 'totalCount'));
    }
}
