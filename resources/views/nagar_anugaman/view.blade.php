@extends('layouts.app') <!-- Extend the layout -->
@section('content')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<!-- Page-specific content -->
<div class="container ward_anugaman_page">
    <div class="card" style="background-color:white;border-radius:5px;">
        <div class="card-header heading">नगर स्तरीय अनुगमन विवरण</div>
        <div class="card-body">
            <!-- Form starts here -->
            <form action="{{ route('nagar_anugamans.store') }}" method="POST">
                @csrf
                <input type="hidden" name="darta_no" value="{{$plan_detail['id']}}">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="inputname">योजनाको नाम: <input type="text" name="program_name"
                                    class="form-control" value="{{$plan_detail['program_name']}}"></label>
                        </div>
                        <div class="col-md-6">
                            <label class="inputname">वडा नं: <input type="text" name="p_ward" value="{{$plan_detail['p_ward']}}"
                                    class="form-control"></label>
                        </div>
                    </div>
                </div>
                <div class="givespace"></div>
                <table class="table table-bordered table-responsive" id="membersTable">
                    <div class="card-header heading">समिति सदस्य विवरण</div>
                    <thead class="thead">
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
                    <tbody>
                        <tr>
                            <td>1.</td>
                            <td class="postname">
                                <select class="form-control" name="post_name[]" style="width: 200px;">
                                    <option value="1">अध्यक्ष</option>
                                    <option value="2">सचिव</option>
                                    <option value="3">कोषाध्यक्ष</option>
                                    <option value="4">संयोजक</option>
                                    <option value="5">सदस्य</option>
                                </select>
                            </td>
                            <td><input type="text" name="name[]"></td>
                            <td><input type="text" name="ward_no[]"></td>
                            <td><input type="text" name="cit_no[]"></td>
                            <td><input type="text" name="issued_d[]"></td>
                            <td><input type="text" name="issued_date[]" placeholder="YYYY/MM/DD"></td>
                            <td>
                                <span class="addMore">
                                    <a class="btn btn-success"><i class="fa fa-plus" style="width:20px;"></i></a>
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-center">
                    <button class="btn btn-success" type="submit">सेव गर्नुहोस</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Hidden template for new rows -->
<template id="rowTemplate">
    <tr>
        <td></td>
        <td class="postname">
            <select class="form-control" name="post_name[]">
                <option value="1">अध्यक्ष</option>
                <option value="2">सचिव</option>
                <option value="3">कोषाध्यक्ष</option>
                <option value="4">संयोजक</option>
                <option value="5">सदस्य</option>
            </select>
        </td>
        <td><input type="text" name="name[]"></td>
        <td><input type="text" name="ward_no[]"></td>
        <td><input type="text" name="cit_no[]"></td>
        <td><input type="text" name="issued_d[]"></td>
        <td><input type="text" name="issued_date[]" placeholder="YYYY/MM/DD"></td>
        <td>
            <span class="addMore">
                <a class="btn btn-success"><i class="fa fa-plus" style="width:20px;"></i></a>
            </span>
            <span class="removeRow">
                <a class="btn btn-danger"><i class="fa fa-minus" style="width:20px;"></i></a>
            </span>
        </td>
    </tr>
</template>
@endsection

@section('scripts')
@endsection