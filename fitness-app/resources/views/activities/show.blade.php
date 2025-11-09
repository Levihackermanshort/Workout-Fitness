@extends('layouts.app')

@section('title', 'View Activity - Fitness Journal')

@section('content')
    <h2 class="page-title">Activity Details</h2>

    <div class="activity-details">
        <div class="detail-row">
            <div class="detail-label">Date:</div>
            <div class="detail-value">{{ $activity->date->format('l, F j, Y') }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Start Time:</div>
            <div class="detail-value">{{ $activity->time_start ? \Carbon\Carbon::parse($activity->time_start)->format('g:i A') : 'Not specified' }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">End Time:</div>
            <div class="detail-value">{{ $activity->time_end ? \Carbon\Carbon::parse($activity->time_end)->format('g:i A') : 'Not specified' }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Activity:</div>
            <div class="detail-value"><strong>{{ $activity->activity }}</strong></div>
        </div>

        @if($activity->time_spent)
        <div class="detail-row">
            <div class="detail-label">Duration:</div>
            <div class="detail-value">{{ $activity->time_spent }}</div>
        </div>
        @endif

        @if($activity->distance)
        <div class="detail-row">
            <div class="detail-label">Distance:</div>
            <div class="detail-value">{{ $activity->distance }}</div>
        </div>
        @endif

        @if($activity->set_count > 0)
        <div class="detail-row">
            <div class="detail-label">Sets:</div>
            <div class="detail-value">{{ $activity->set_count }}</div>
        </div>
        @endif

        @if($activity->reps > 0)
        <div class="detail-row">
            <div class="detail-label">Reps:</div>
            <div class="detail-value">{{ $activity->reps }}</div>
        </div>
        @endif

        @if($activity->note)
        <div class="detail-row">
            <div class="detail-label">Notes:</div>
            <div class="detail-value">{{ $activity->note }}</div>
        </div>
        @endif

        <div class="detail-row">
            <div class="detail-label">Created:</div>
            <div class="detail-value">{{ $activity->created_at->format('F j, Y g:i A') }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Last Updated:</div>
            <div class="detail-value">{{ $activity->updated_at->format('F j, Y g:i A') }}</div>
        </div>
    </div>

    <div class="form-actions">
        <a href="{{ route('activities.edit', $activity) }}" class="btn btn-primary">Edit Activity</a>
        <form action="{{ route('activities.destroy', $activity) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this activity?')">Delete Activity</button>
        </form>
        <a href="{{ route('activities.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
@endsection

