@extends('layouts.app')

@section('title', 'Search Activities - Fitness Journal')

@section('content')
    <h2 class="page-title">Search Activities</h2>

    <div class="search-form">
        <form action="{{ route('activities.search') }}" method="GET">
            <div class="form-row">
                <div class="form-group">
                    <label for="search_date">Search by Date</label>
                    <input type="date" id="search_date" name="search_date" value="{{ $searchDate }}">
                </div>

                <div class="form-group">
                    <label for="search">Search by Keyword</label>
                    <input type="text" id="search" name="search" value="{{ $searchTerm }}" placeholder="Search activity name or notes...">
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Search</button>
                    <a href="{{ route('activities.search') }}" class="btn btn-secondary">Clear</a>
                </div>
            </div>
        </form>
    </div>

    @if($activities->count() > 0)
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Activity</th>
                        <th>Duration</th>
                        <th>Distance</th>
                        <th>Sets</th>
                        <th>Reps</th>
                        <th>Note</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($activities as $activity)
                        <tr>
                            <td>{{ $activity->date->format('Y-m-d') }}</td>
                            <td>{{ $activity->time_start ? \Carbon\Carbon::parse($activity->time_start)->format('H:i') : '-' }}</td>
                            <td>{{ $activity->time_end ? \Carbon\Carbon::parse($activity->time_end)->format('H:i') : '-' }}</td>
                            <td>{{ $activity->activity }}</td>
                            <td>{{ $activity->time_spent ?? '-' }}</td>
                            <td>{{ $activity->distance ?? '-' }}</td>
                            <td>{{ $activity->set_count ?: '-' }}</td>
                            <td>{{ $activity->reps ?: '-' }}</td>
                            <td>{{ Str::limit($activity->note, 30) ?? '-' }}</td>
                            <td>
                                <div class="action-links">
                                    <a href="{{ route('activities.show', $activity) }}" class="btn btn-secondary" style="padding: 5px 10px; font-size: 12px;">View</a>
                                    <a href="{{ route('activities.edit', $activity) }}" class="btn btn-primary" style="padding: 5px 10px; font-size: 12px;">Edit</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="pagination">
            {{ $activities->links() }}
        </div>
    @else
        <div class="empty-state">
            <h3>No activities found</h3>
            <p>Try adjusting your search criteria.</p>
            <a href="{{ route('activities.index') }}" class="btn btn-primary">View All Activities</a>
        </div>
    @endif
@endsection

