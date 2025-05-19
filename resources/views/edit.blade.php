<div>
    <h2>Edit Project</h2>
    <form action="/edit/{{ $project->id }}" method="POST">
        @csrf

        <div class="form-group">
            <input type="text" name="title" value="{{ old('title', $project->title) }}" placeholder="project title"
                required>
        </div>

        <div class="form-group">
            <textarea name="description" placeholder="Description">{{ old('description', $project->description) }}</textarea>
        </div>

        <div class="form-group">
            <input type="text" name="projectUrl" value="{{ old('projectUrl', $project->projectUrl) }}"
                placeholder="project url">
        </div>

        <div class="form-group">
            <input type="text" name="image" value="{{ old('image', $project->image) }}" placeholder="image URL"
                required>
        </div>

        <div class="form-group">
            <select name="status" required>
                <option value="draft" {{ $project->status === 'draft' ? 'selected' : '' }}>draft</option>
                <option value="published" {{ $project->status === 'published' ? 'selected' : '' }}>published</option>
            </select>
        </div>

        <div class="form-group">
            <button type="submit">Update</button>
        </div>
    </form>

    <!-- Add delete form -->
    <form action="/delete/{{ $project->id }}" method="POST"
        onsubmit="return confirm('Are you sure you want to delete this project?');">
        @csrf
        @method('DELETE')
        <div class="form-group">
            <button type="submit" style="background-color: #ff4444; color: white;">Delete Project</button>
        </div>
    </form>
</div>

<style>
    .form-group {
        margin-bottom: 10px;
    }

    .form-group input[type="text"],
    .form-group select {
        width: 300px;
        padding: 5px;
    }

    textarea {
        width: 100%;
        min-height: 100px;
        padding: 5px;
    }

    /* Style for delete button */
    .form-group button[type="submit"] {
        padding: 5px 10px;
        cursor: pointer;
    }

    .form-group button[type="submit"]:hover {
        opacity: 0.8;
    }
</style>
