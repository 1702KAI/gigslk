<!-- resources/views/employer/editJob.index.php -->

<x-app-layout>
    <!-- ... (any existing code) ... -->
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Include Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UoU7fmODPDomLWT+5e7fNQ2lc1RISXx7fFV+4G2GpCGtmhDU6LlYBk1yHwrJfz1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mt-2 mb-4">Edit Job Details</h2>

                <!-- Job Edit Form -->
                <form method="post" action="{{ route('employer.updateJob', ['jobId' => $job->id]) }}">
                    @csrf
                    @method('PUT')

                    <!-- Job Title -->
                    <div class="form-group">
                        <label for="title">Job Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $job->title }}">
                    </div>

                    <!-- Job Description -->
                    <div class="form-group">
                        <label for="description">Job Description</label>
                        <textarea class="form-control" id="description" name="description">{{ $job->description }}</textarea>
                    </div>

                    <!-- Add more job fields as needed -->

                    <button type="submit" class="btn btn-primary">Update Job</button>
                </form>

                <!-- Add a button to go back to the bid index page -->
                <a href="{{ route('employer.bidIndex') }}" class="btn btn-secondary mt-3">Cancel</a>
            </div>
        </div>
    </div>
</x-app-layout>
