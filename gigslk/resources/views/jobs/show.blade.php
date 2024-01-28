<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Job</title>
    <!-- Include Bootstrap CSS or any other CSS framework you prefer -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h2>Job Details</h2>
                <a href="{{ route('employer.job.index') }}" class="btn btn-primary mb-3">Back to Job Listings</a>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $job->title }}</h5>
                        <p class="card-text">{{ $job->description }}</p>
                        <p class="card-text"><strong>Skills:</strong> {{ $job->skills }}</p>
                        <p class="card-text"><strong>Budget:</strong> ${{ number_format($job->budget, 2) }}</p>
                        <p class="card-text"><strong>Duration:</strong> {{ $job->duration }} days</p>
                        <p class="card-text"><strong>Created At:</strong> {{ $job->created_at }}</p>
                        <p class="card-text"><strong>Updated At:</strong> {{ $job->updated_at }}</p>

                        <!-- Add the form for updating status -->
                        <form action="{{ route('employer.job.updateStatus', $job->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="status">Status:</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="active" {{ $job->status === 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ $job->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    <option value="in-progress" {{ $job->status === 'in-progress' ? 'selected' : '' }}>In Progress</option>
                                    <option value="completed" {{ $job->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Status</button>
                        </form>
                        <br>

                        <a href="{{ route('employer.job.edit', $job->id) }}" class="btn btn-primary">Edit Job</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS or any other JS framework you prefer -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>
