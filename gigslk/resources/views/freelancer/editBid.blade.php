<!-- resources/views/freelancer/editBid.blade.php -->

<x-app-layout>
    <br>
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
                <h2 class="mt-2 mb-4">Edit Bid</h2>
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('freelancer.bids.update', $bid->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="proposal">Proposal:</label>
                        <textarea name="proposal" id="proposal" class="form-control" rows="4" required>{{ $bid->proposal }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="portfolio">Portfolio:</label>
                        <input type="text" name="portfolio" id="portfolio" class="form-control" value="{{ $bid->portfolio }}">
                    </div>

                    {{-- <!-- Add a form field for bid status with dropdown -->
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select class="form-control" id="status" name="status">
                            <option value="active" {{ $bid->status === 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ $bid->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                            <option value="in-progress" {{ $bid->status === 'in-progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="completed" {{ $bid->status === 'completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                    </div> --}}

                    <!-- Add more form fields for bid details as needed -->

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Update Bid</button>
                        <a href="{{ route('freelancer.manageBids') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
