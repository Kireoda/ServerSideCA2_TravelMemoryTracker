@csrf

@if(isset($memory))
    @method('PUT')
@endif

<div>
    <label for="title">Title</label>
    <input type="text" name="title" id="title"
           value="{{ old('title', $memory->title ?? '') }}">
    @error('title')
    <div class="error-text">{{ $message }}</div>
    @enderror
</div>

<div>
    <label for="location">Location</label>
    <input type="text" name="location" id="location"
           value="{{ old('location', $memory->location ?? '') }}">
    @error('location')
    <div class="error-text">{{ $message }}</div>
    @enderror
</div>

<div>
    <label for="date">Date</label>
    <input type="date" name="date" id="date"
           value="{{ old('date', $memory->date ?? '') }}">
    @error('date')
    <div class="error-text">{{ $message }}</div>
    @enderror
</div>

<div>
    <label for="description">Description</label>
    <textarea name="description" id="description">{{ old('description', $memory->description ?? '') }}</textarea>
    @error('description')
    <div class="error-text">{{ $message }}</div>
    @enderror
</div>

<button type="submit" class="button">
    {{ isset($memory) ? 'Update Memory' : 'Save Memory' }}
</button>