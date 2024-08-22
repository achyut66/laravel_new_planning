<!-- resources/views/ward_anugaman/print_view.blade.php -->

<!DOCTYPE html>
<html>

<head>
    <title>Print View</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Print specific styles */
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="text-center">
            <div><h4>नमुना नगरपालिका</h4></div>
            <div><h2>नगरकार्यपालिकाको कार्यालय</h2></div>
            <div><h4>बागमती प्रदेश,नेपाल </h4></div>
        </div>
        <div class="givespace" style="margin-top:15px;"></div>
        <div class="text-center" style="font-weight:bold;margin-left:12px;">वडा अनुगमन सदस्य विवरण  <span style="margin-left:804px;"><button
                    class="btn btn-primary no-print" onclick="window.print()">Print</button></span></div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th colspan="8">
                        <label>योजनाको नाम: <u>{{ $yojana->program_name }}</u></label>
                        <span style="margin-left:25px;">योजना दर्ता नं: <u>{{ $yojana['id']}}</u></span>
                        <span style="margin-left:25px;">
                            <label>वडा नं: <u>{{ $yojana->p_ward }}</u></label>
                        </span>
                    </th>
                </tr>
                <tr>
                    <th>सी.नं</th>
                    <th>पद</th>
                    <th>नाम</th>
                    <th>वडा नं</th>
                    <th>नागरिकता नं.</th>
                    <th>जारि जिल्ला</th>
                    <th>जारि मिति</th>
                </tr>
            </thead>
            <tbody>
                @php
$i = 1; // Initialize counter outside the loop
                @endphp

                @foreach ($ward_a_details as $wa)
                                @php
    // Determine the post name translation based on post_name
    if ($wa->post_name == 1) {
        $new_val = "अध्यक्ष"; // "adakshy"
    } elseif ($wa->post_name == 2) {
        $new_val = "सचिव"; // "sachib"
    } elseif ($wa->post_name == 3) {
        $new_val = "कोशाध्यक्ष";
    } elseif ($wa->post_name == 4) {
        $new_val = "संयोजक";
    } else {
        $new_val = "सदस्य";
    }
                                @endphp

                                <tr>
                                    <td>{{ $i++ }}</td> <!-- Increment counter here -->
                                    <td>{{ $new_val }}</td>
                                    <td>{{ $wa->name }}</td>
                                    <td>{{ $wa->p_ward }}</td>
                                    <td>{{ $wa->cit_no }}</td>
                                    <td>{{ $wa->issued_district }}</td>
                                    <td>{{ $wa->issued_date }}</td>
                                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="givespace" style="margin-top:25px;"></div>
        <div class="text-center" style="font-weight:bold;margin-left:12px;">नगर अनुगमन सदस्य विवरण  </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>सी.नं</th>
                    <th>पद</th>
                    <th>नाम</th>
                    <th>वडा नं</th>
                    <th>नागरिकता नं.</th>
                    <th>जारि जिल्ला</th>
                    <th>जारि मिति</th>
                </tr>
            </thead>
            <tbody>
                @php
$i = 1; // Initialize counter outside the loop
                @endphp

                @foreach ($nagar_a_details as $wa)
                                @php
    // Determine the post name translation based on post_name
    if ($wa->post_name == 1) {
        $new_val = "अध्यक्ष"; // "adakshy"
    } elseif ($wa->post_name == 2) {
        $new_val = "सचिव"; // "sachib"
    } elseif ($wa->post_name == 3) {
        $new_val = "कोशाध्यक्ष";
    } elseif ($wa->post_name == 4) {
        $new_val = "संयोजक";
    } else {
        $new_val = "सदस्य";
    }
                                @endphp

                                <tr>
                                    <td>{{ $i++ }}</td> <!-- Increment counter here -->
                                    <td>{{ $new_val }}</td>
                                    <td>{{ $wa->name }}</td>
                                    <td>{{ $wa->p_ward }}</td>
                                    <td>{{ $wa->cit_no }}</td>
                                    <td>{{ $wa->issued_district }}</td>
                                    <td>{{ $wa->issued_date }}</td>
                                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</body>

</html>