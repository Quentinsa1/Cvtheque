@extends('admin.layouts.template')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <h2 class="mb-4">Optimize a CV for a Job Offer</h2>

                        <form action="{{ route('optimize.process') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="cv_id">Select CV:</label>
                                <se
                                lect name="cv_id" class="form-control select2" required>
                                    @foreach($cvs as $cv)
                                        <option value="{{ $cv->id }}">CV #{{ $cv->id }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="job_offer">Job Offer:</label>
                                <div class="input-group">
                                    <textarea name="job_offer" class="form-control" id="job_offer" rows="4" placeholder="Paste the job description here..." required></textarea>
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-outline-secondary" id="toggle-eye">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">Optimize</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();

        $('#toggle-eye').on('click', function() {
            var textarea = $('#job_offer');
            var type = textarea.attr('type') === 'password' ? 'text' : 'password';
            textarea.attr('type', type);
            $(this).find('i').toggleClass('fa-eye fa-eye-slash');
        });
    });
</script>
@endpush
