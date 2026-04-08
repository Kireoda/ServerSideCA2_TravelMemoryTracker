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

<div>
    <label for="cover_image">Cover Image</label>
    <input type="file" name="cover_image" id="cover_image" accept="image/*">
    @error('cover_image')
    <div class="error-text">{{ $message }}</div>
    @enderror
    @if(!empty($trip) && $trip->cover_image)
        <p class="status-text">Current image: {{ basename($trip->cover_image) }}</p>
    @endif
</div>

<div>
    <label for="gallery_images">Trip Images</label>
    <input type="file" name="gallery_images[]" id="gallery_images" accept="image/*" multiple>
    @error('gallery_images')
    <div class="error-text">{{ $message }}</div>
    @enderror
    @error('gallery_images.*')
    <div class="error-text">{{ $message }}</div>
    @enderror
</div>

@if(!empty($trip) && $trip->images->count())
    <div>
        <label>Choose Cover From Existing Images</label>
        <div class="image-grid">
            @foreach($trip->images as $image)
                <label class="image-option">
                    <input type="radio" name="cover_choice" value="{{ $image->path }}" {{ $trip->cover_image === $image->path ? 'checked' : '' }}>
                    <img src="{{ asset('storage/' . $image->path) }}" alt="Trip image">
                </label>
            @endforeach
        </div>
    </div>
@endif

<button type="submit" class="button">
    {{ isset($trip) ? 'Update Trip' : 'Create Trip' }}
</button>
