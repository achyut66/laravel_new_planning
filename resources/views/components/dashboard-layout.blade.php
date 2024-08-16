<!-- resources/views/components/dashboard-layout.blade.php -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<div class="text-center" style="color:white;">
    नमुना नगरपालिका<br> नगरकार्यपालिकाको कार्यालय<br>बागमती प्रदेश, नेपाल
</div>
<div class="givespace"></div>
<div class="givespace"></div>
<div class="card" style="background-color:rgb(17 24 39 / var(--tw-bg-opacity));">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <div><a href="{{ route('ward_anugamans.showall') }}">
                        <button class="btn btn-success" style="padding: 60px 236px;">
                            वार्ड अनुगमन विवरण
                        </button>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div><a href="{{ route('nagar_anugamans.showall')}}"><button class="btn btn-success"
                            style="padding: 60px 236px;">नगर अनुगमन
                            विवरण</button></a>
                </div>
            </div>
        </div>
    </div>
</div>