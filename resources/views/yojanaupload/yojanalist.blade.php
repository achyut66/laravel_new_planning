@extends('layouts.app') <!-- Extend the layout -->
@section('content')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<!-- Page-specific content -->
<div class="container ward_anugaman_page">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card" style="background-color:white;border-radius:5px;">
        <div class="card-header heading">योजना कार्यक्रम दर्ता गर्नुहोस</div>
        <div class="card-body">
            <!-- Form starts here -->
            <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <label class="inputname">योजना Upload गर्नुहोस :
                                <input type="file" accept=".xlsx, .xls" required name="file">
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label class="inputname">स्याम्पल Download :
                                <a href="{{ asset('sample/excel_demo.xlsx') }}" class="btn btn-primary"
                                    download>Download Sample</a>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="givespace"></div>
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Upload गर्नुहोस</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Hidden template for new rows -->
@endsection
@section('scripts')
@endsection