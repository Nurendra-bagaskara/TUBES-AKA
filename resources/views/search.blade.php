<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Patients</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

    @include('navbar')
<div class="container mt-5">
    <h1 class="text-center mb-4">Patient Search Iteratif</h1>

    <!-- Search Form -->
    <form action="{{ route('search.sequential') }}" method="POST" class="mb-4">
        @csrf
        <div class="input-group">
            <input 
                type="text" 
                name="search" 
                class="form-control" 
                placeholder="Search by Patient Code" 
                value="{{ old('search', $search ?? '') }}" 
                required
            >
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>

    <!-- Display Search Results -->
    @if(isset($message))
        <div class="alert alert-warning">
            {{ $message }} dengan waktu {{ number_format($time, 6) }} detik.
        </div>
    @endif

    @if(isset($time,$messages))
        <div class="alert alert-info">
            Pencarian berhasil dengan waktu {{ number_format($time, 6) }} detik.
            {{ $messages }}
        </div>
    @endif

    <!-- Display All or Filtered Data -->
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Full Name</th>
            <th>Gender</th>
            <th>Age</th>
            <th>Admission Date</th>
            <th>Diagnosis</th>
            <th>Doctor</th>
            <th>Code</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($patients) && is_iterable($patients) && $patients->isNotEmpty())
            @foreach($patients as $index => $patient)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $patient->full_name }}</td>
                    <td>{{ $patient->gender }}</td>
                    <td>{{ $patient->age }}</td>
                    <td>{{ $patient->admission_date }}</td>
                    <td>{{ $patient->diagnosis }}</td>
                    <td>{{ $patient->doctor }}</td>
                    <td>{{ $patient->kode }}</td>
                    <td>{{ $patient->status }}</td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="9" class="text-center">No data available.</td>
            </tr>
        @endif

        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
