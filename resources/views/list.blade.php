<div>
    <h1>All Projects</h1>

    <div class="projects-list">
        @foreach ($projects as $project)
            <div class="project-card">
                @if ($project->image)
                    <img src="{{ $project->image }}" alt="{{ $project->title }}" class="project-image">
                @endif
                <h3>{{ $project->title }}</h3>
                <p>{{ Str::limit($project->description, 100) }}</p>
                <p>Status: {{ ucfirst($project->status) }}</p>
                <a href="/edit/{{ $project->id }}" class="view-link">View Project</a>
            </div>
        @endforeach
    </div>
</div>

<style>
    .projects-list {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }

    .project-card {
        border: 1px solid #ddd;
        padding: 15px;
        border-radius: 5px;
    }

    .project-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 4px;
        margin-bottom: 10px;
    }

    .view-link {
        display: inline-block;
        margin-top: 10px;
        padding: 5px 10px;
        background-color: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 4px;
    }

    .view-link:hover {
        background-color: #0056b3;
    }
</style>
