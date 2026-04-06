@csrf

@if(isset($trip))
    @method('PUT')
@endif

<div>
    <label for="title">Trip Title</label>
    <input type="text" name="title" id="title"
           value="{{ old('title', $trip->title ?? '') }}">
    @error('title')
    <div class="error-text">{{ $message }}</div>
    @enderror
</div>

<div>
    <label for="location">Location</label>
    <input type="text" name="location" id="location"
           value="{{ old('location', $trip->location ?? '') }}">
    @error('location')
    <div class="error-text">{{ $message }}</div>
    @enderror
</div>

<div>
    <label for="start_date">Start Date</label>
    <input type="date" name="start_date" id="start_date"
           value="{{ old('start_date', $trip->start_date ?? '') }}">
    @error('start_date')
    <div class="error-text">{{ $message }}</div>
    @enderror
</div>

<div>
    <label for="end_date">End Date</label>
    <input type="date" name="end_date" id="end_date"
           value="{{ old('end_date', $trip->end_date ?? '') }}">
    @error('end_date')
    <div class="error-text">{{ $message }}</div>
    @enderror
</div>

<div>
    <label for="description">Description</label>
    <textarea name="description" id="description">{{ old('description', $trip->description ?? '') }}</textarea>
    @error('description')
    <div class="error-text">{{ $message }}</div>
    @enderror
</div>

<button type="submit" class="button">
    {{ isset($trip) ? 'Update Trip' : 'Create Trip' }}
</button>