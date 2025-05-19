<div>
    <h2>Create a new Project</h2>
    <form action="/create-project" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <input type="text" name="title" placeholder="project title" required>
        </div>

        <div class="form-group">
            <textarea name="description" placeholder="Description"></textarea>
        </div>

        <div class="form-group">
            <input type="text" name="projectUrl" placeholder="project url">
        </div>

        <div class="form-group">
            <input type="text" name="image" placeholder="image URL" required>
        </div>

        <div class="form-group">
            <select name="status" required>
                <option value="draft">draft</option>
                <option value="published">published</option>
            </select>
        </div>

        <div class="form-group">
            <button type="submit">Submit</button>
        </div>
    </form>

    <style>
        .form-group {
            margin-bottom: 10px;
        }

        .form-group input[type="text"],
        .form-group input[type="file"],
        .form-group select {
            width: 300px;
            padding: 5px;
        }

        textarea {
            width: 100%;
            min-height: 100px;
            padding: 5px;
        }
    </style>
