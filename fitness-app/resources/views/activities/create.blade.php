@extends('layouts.app')

@section('title', 'Add Activity - Fitness Journal')

@section('content')
    <h2 class="page-title">Add New Activity</h2>

    <form action="{{ route('activities.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="date">Date <span style="color: #e74c3c;">*</span></label>
            <input type="date" id="date" name="date" value="{{ old('date', date('Y-m-d')) }}" required class="@error('date') error-input @enderror">
            @error('date')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="time_start">Start Time</label>
            <input type="time" id="time_start" name="time_start" value="{{ old('time_start') }}" class="@error('time_start') error-input @enderror">
            @error('time_start')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="time_end">End Time</label>
            <input type="time" id="time_end" name="time_end" value="{{ old('time_end') }}" class="@error('time_end') error-input @enderror">
            @error('time_end')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="activity">Activity Name <span style="color: #e74c3c;">*</span></label>
            <input type="text" id="activity" name="activity" value="{{ old('activity') }}" required maxlength="255" class="@error('activity') error-input @enderror">
            @error('activity')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="time_spent">Duration (e.g., 60 mins)</label>
            <input type="text" id="time_spent" name="time_spent" value="{{ old('time_spent') }}" maxlength="50" class="@error('time_spent') error-input @enderror">
            @error('time_spent')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="distance">Distance (e.g., 8 km)</label>
            <input type="text" id="distance" name="distance" value="{{ old('distance') }}" maxlength="50" class="@error('distance') error-input @enderror">
            @error('distance')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="set_count">Sets</label>
            <input type="number" id="set_count" name="set_count" value="{{ old('set_count', 0) }}" min="0" class="@error('set_count') error-input @enderror">
            @error('set_count')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="reps">Reps</label>
            <input type="number" id="reps" name="reps" value="{{ old('reps', 0) }}" min="0" class="@error('reps') error-input @enderror">
            @error('reps')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="note">Notes</label>
            <textarea id="note" name="note" rows="4" class="@error('note') error-input @enderror">{{ old('note') }}</textarea>
            @error('note')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-success">Save Activity</button>
            <a href="{{ route('activities.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
@endsection

