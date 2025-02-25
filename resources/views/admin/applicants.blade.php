@extends('admin.layouts.template')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <div class="container">
                    <h2>Optimize a CV for a Job Offer</h2>

                    <form action="{{ route('cv.optimize.process') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="cv_id" class="form-label">Select a CV:</label>
                            <select class="form-control" name="cv_id" id="cv_id" required>
                                @foreach($cvs as $cv)
                                    <option value="{{ $cv->id }}">{{ $cv->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="job_offer" class="form-label">Enter the Job Offer:</label>
                            <textarea class="form-control" name="job_offer" id="job_offer" rows="5" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Generate Optimized CV</button>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
