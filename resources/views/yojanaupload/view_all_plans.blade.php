@extends('layouts.app') <!-- Extend the layout -->
@section('content')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    /* Custom CSS for hover dropdown */
    .hover-dropdown:hover .dropdown-menu {
        display: block;
        background-color: #2B55F8;
    }

    .dropdown-menu {
        display: none;
        /* Hide by default */
    }
</style>
<!-- Page-specific content -->
<div class="container ward_anugaman_page">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card" style="background-color:white;border-radius:5px;">
        <div class="card-header heading">योजना कार्यक्रम विवरण गर्नुहोस</div>
        <div class="card-body">
            <!-- Form starts here -->
            <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <table class="table table-bordered striped">
                    <tr>
                        <th>दर्ता.नं</th>
                        <th>राजपत्र नं .</th>
                        <th>योजनाको नाम</th>
                        <th>वार्ड नं</th>
                        <th>बिषयगत क्षेत्र</th>
                        <th>शिर्षकगत किसिम</th>
                        <th>बिनियोजन किसिम</th>
                        <th>अनुदान किसिम</th>
                        <th>बिनियोजन श्रोत</th>
                        <th>अनुदान रकम</th>
                        <th>बजेट शिर्षक नं</th>
                        <th>बजेट श्रोत</th>
                        <th>#</th>
                    </tr>
                    <!-- @php
                        if (!empty($w_result)) {
                            foreach ($w_result as $w):
                                $name = "ward";
                            endforeach;
                        } elseif (!empty($n_result)) {
                            foreach ($n_result as $n):
                                $name = "nagar";
                            endforeach;
                        } else {
                            $name = "nabhariyeko";
                        }
                    @endphp -->
                    @foreach($data as $d)
                        <tr>
                            <td>
                                <div class="dropdown hover-dropdown">
                                    <button class="btn btn-success" type="button" id="dropdownMenuButton"
                                        aria-expanded="false">
                                        {{ $d['id']}}
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item"
                                                href="{{ route('ward_anugamans.index', ['id' => $d['id']])}}">वार्ड
                                                अनुगमन</a></li>
                                        <li><a class="dropdown-item"
                                                href="{{ route('nagar_anugamans.index', ['id' => $d['id']])}}">नगर
                                                अनुगमन</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                            <td>{{ $d['rajpatra_no']}}</td>
                            <td>{{ $d['program_name']}}</td>
                            <td>{{ $d['p_ward']}}</td>
                            <td>{{ $d['bishaygat_chhetra']}}</td>
                            <td>{{ $d['shirshak_kisim']}}</td>
                            <td>{{ $d['biniyojan_kisim']}}</td>
                            <td>{{ $d['anudan_kisim']}}</td>
                            <td>{{ $d['biniyojan_shrot']}}</td>
                            <td>{{ $d['anudan_rakam']}}</td>
                            <td>{{ $d['bajet_shirshak']}}</td>
                            <td>{{ $d['bajet_shrot']}}</td>
                            <td><a href="{{ route('yojanaupload.seeDetails', ['darta_no' => $d['id']]) }}"
                                    class="btn btn-primary"><i class="fa fa-eye"></i></a></td>
                        </tr>
                    @endforeach
                </table>
            </form>
            <div class="pagination">
                {{ $data->links() }}
            </div>
        </div>
    </div>
</div>
<!-- Hidden template for new rows -->
@endsection

@section('scripts')
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
@endsection