@extends('layouts.app')

@section('title', 'All Activities - Fitness Journal')

@section('content')
    <h2 class="page-title">All Activities</h2>

    <div class="action-links mb-20">
        <a href="{{ route('activities.create') }}" class="btn btn-primary">Add New Activity</a>
        <a href="{{ route('activities.search') }}" class="btn btn-secondary">Search Activities</a>
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
                                    <form action="{{ route('activities.destroy', $activity) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" style="padding: 5px 10px; font-size: 12px;" onclick="return confirm('Are you sure you want to delete this activity?')">Delete</button>
                                    </form>
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
            <p>You haven't recorded any activities yet.</p>
            <a href="{{ route('activities.create') }}" class="btn btn-primary">Add Your First Activity</a>
        </div>
    @endif
@endsection

