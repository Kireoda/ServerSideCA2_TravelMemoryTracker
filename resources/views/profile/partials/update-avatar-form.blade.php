
<div>
    <h3>Profile Photo</h3>

    <div style="margin-bottom: 20px;">
@if(auth()->user()->avatar)
    <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="Profile photo" style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;">
@else
    <div style="width: 100px; height: 100px; border-radius: 50%; background: #ccc; display: flex; align-items: center; justify-content: center;">No photo</div>
    @endif
    </div>

    <form method="POST" action="{{ route('profile.avatar') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="avatar">Upload Photo</label>
            <input type="file" name="avatar" id="avatar" accept="image/*">
            @error('avatar')
            <p class="error-text">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="button">Upload</button>
    </form>

    @if(session('status') === 'avatar-updated')
        <div class="flash-success" style="margin-top: 15px;">Profile photo updated!</div>
        @endif
        </div>