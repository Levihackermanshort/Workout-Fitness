@extends('layouts.app')

@section('title', 'Edit Activity - Fitness Journal')

@section('content')
    <h2 class="page-title">Edit Activity</h2>

    <form action="{{ route('activities.update', $activity) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="date">Date <span style="color: #e74c3c;">*</span></label>
            <input type="date" id="date" name="date" value="{{ old('date', $activity->date->format('Y-m-d')) }}" required>
            @error('date')
                <span style="color: #e74c3c; font-size: 12px;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="time_start">Start Time</label>
            <input type="time" id="time_start" name="time_start" value="{{ old('time_start', $activity->time_start ? \Carbon\Carbon::parse($activity->time_start)->format('H:i') : '') }}">
            @error('time_start')
                <span style="color: #e74c3c; font-size: 12px;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="time_end">End Time</label>
            <input type="time" id="time_end" name="time_end" value="{{ old('time_end', $activity->time_end ? \Carbon\Carbon::parse($activity->time_end)->format('H:i') : '') }}">
            @error('time_end')
                <span style="color: #e74c3c; font-size: 12px;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="activity">Activity Name <span style="color: #e74c3c;">*</span></label>
            <input type="text" id="activity" name="activity" value="{{ old('activity', $activity->activity) }}" required maxlength="255">
            @error('activity')
                <span style="color: #e74c3c; font-size: 12px;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="time_spent">Duration (e.g., 60 mins)</label>
            <input type="text" id="time_spent" name="time_spent" value="{{ old('time_spent', $activity->time_spent) }}" maxlength="50">
            @error('time_spent')
                <span style="color: #e74c3c; font-size: 12px;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="distance">Distance (e.g., 8 km)</label>
            <input type="text" id="distance" name="distance" value="{{ old('distance', $activity->distance) }}" maxlength="50">
            @error('distance')
                <span style="color: #e74c3c; font-size: 12px;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="set_count">Sets</label>
            <input type="number" id="set_count" name="set_count" value="{{ old('set_count', $activity->set_count) }}" min="0">
            @error('set_count')
                <span style="color: #e74c3c; font-size: 12px;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="reps">Reps</label>
            <input type="number" id="reps" name="reps" value="{{ old('reps', $activity->reps) }}" min="0">
            @error('reps')
                <span style="color: #e74c3c; font-size: 12px;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="note">Notes</label>
            <textarea id="note" name="note" rows="4">{{ old('note', $activity->note) }}</textarea>
            @error('note')
                <span style="color: #e74c3c; font-size: 12px;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-success">Update Activity</button>
            <a href="{{ route('activities.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
@endsection

