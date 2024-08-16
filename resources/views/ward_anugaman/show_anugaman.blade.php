@extends('layouts.app') <!-- Extend the layout -->
@section('content')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<!-- Page-specific content -->
<div class="container ward_anugaman_page">
    <div class="card" style="background-color:white;border-radius:5px;">
        <div class="card-header heading"><span style="margin-left:120px;">वडा स्तरीय अनुगमन विवरण</span> <span style="margin-left:80px;">
        <a href="{{ route('ward_anugamans.printView', ['darta_no' => $wardAnugaman->darta_no]) }}">
            <button class="btn btn-success">PRINT</button>
        </a>
        <div class="card-body">
            <!-- Form starts here -->
            <!-- <form action="{{ route('ward_anugamans.store') }}" method="POST"> -->
            @csrf
            <table class="table table-bordered striped">
                <label>योजनाको नाम: <u>{{ $wardAnugaman['program_name']}}</u></label> 
                <span style="margin-left:25px;">योजना दर्ता नं: <u>{{ $wardAnugaman['darta_no']}}</u></span>
                <span style="margin-left:25px;"><label>वडा नं: <u>{{ $wardAnugaman['p_ward']}}</u> </label></span>
                <thead>
                    <tr>
                        <th>सी.नं</th>
                        <th>पद</th>
                        <th>नाम</th>
                        <th>वडा नं</th>
                        <th>नागरिकता नं.</th>
                        <th>जारि जिल्ला</th>
                        <th>जारि मिति</th>
                        <th>#</th>
                    </tr>
                </thead>
                @php
$i = 1; // Initialize counter outside the loop
                @endphp

                @foreach ($wardAnugamans as $wa)
                                @php
    // Determine the post name translation based on post_name
    if ($wa->post_name == 1) {
        $new_val = "अध्यक्ष"; // "adakshy"
    } elseif ($wa->post_name == 2) {
        $new_val = "सचिव"; // "sachib"
    }elseif($wa->post_name == 3){
        $new_val = "कोशाध्यक्ष";
    }elseif($wa->post_name == 4){
        $new_val = "संयोजक";
    }else{
        $new_val = "सदस्य";
    }
                                @endphp

                                <tr>
                                    <td>{{ $i++ }}</td> <!-- Increment counter here -->
                                    <td>{{ $new_val }}</td>
                                    <td>{{ $wa['name']}}</td>
                                    <td>{{ $wa['p_ward']}}</td>
                                    <td>{{ $wa['cit_no']}}</td>
                                    <td>{{$wa['issued_district']}}</td>
                                    <td>{{ $wa['issued_date']}}</td>
                                    <td><button class="btn btn-warning">EDIT</button></td>
                                </tr>
                @endforeach

            </table>
            <!-- </form> -->
        </div>
    </div>
</div>

<!-- Hidden template for new rows -->

@endsection

@section('scripts')
@endsection