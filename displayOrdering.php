<?php 

$conn = mysqli_connect("localhost", "root", "", "jbl");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.bootstrap5.min.css">
</head>
<body>

<p>সূত্র: এমকিউ/ সার্ভার নিরাপত্তা নাইট/ ডিসেম্বর-২০২২ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;তারিখ: ৩০/১১/২০২২</p> 
</br> <center><h4><u>অফিস নির্দেশ</u></h4></center>
    <p>
অত্র ডিপার্টমেন্টে সংরক্ষিত সার্ভার সমূহ এবং কম্পিউটার সামগ্রীর ২৪ ঘণ্টা নিরবিচ্ছিন্ন নিরাপত্তা নিশ্চিতকরণের লক্ষ্যে ডিসেম্বর ২০২২(০১-৩১ তারিখ পর্যন্ত) মাসের রাত্রিকালীন শিফটে (রাত ৮ টা হতে সকাল ৮ টা পর্যন্ত) নিম্নবর্ণিত কর্মকর্তাদের পাশে বর্ণিত তারিখ অনুযায়ী উপস্থিত থেকে দায়িত্ব পালন করার জন্য নির্দেশ প্রদান করা হলো। ন, পিও আইটি এর তত্ত্বাবধানে সংশ্লিষ্ট কর্মকর্তাগণ সার্ভার রুমসহ কম্পিউটার সামগ্রীর নিরাপত্তার দায়িত্বে নিয়োজিত থাকবেন। উল্লেখ্যঃ জরুরি কোনো প্রয়োজনে বর্ণিত দায়িত্ব পরিবর্তন করতে হলে অত্র ডিপার্টমেন্টের দায়িত্বপ্রাপ্ত কর্মকর্তা জনাব মানতাজেদুল কাদেরী, পিও-আইটি কে পূর্বেই অবহিত করতে হবে।</p>
<div class="dashboard flex-grow-1">
<div class="dash_headline d-flex bg-blue pb-5"></div>

        <div class="container-fluid px-4">
        <div class="row at-4">
            <div class="col-md-12">
                <div class="card">
                <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered table-striped" id="example">
                <thead>
                    <tr>
                        <th>নং</th>
                        <th>নির্বাহী/কর্মকর্তার নাম</th>
                        <th>পদবী</th>
                        <th>তারিখ</th>

                    </tr>
                </thead>
                <tbody>
                    <?php 
                         $check = "SELECT * FROM info  ";
                         $posts_run = mysqli_query($conn, $check);

                         if(mysqli_num_rows($posts_run) >0)
                         {
                            foreach($posts_run as $post)
                            {
                                ?>
                                <tr>
                                    <td><?= $post['dutyID'] ?></td>
                                    <td><?= $post['empID'] ?></td>
                                    <td><?= $post['shiftID'] ?></td>
                                    <td>
                                    <?= $post['Date'] ?>
                                    </td>
                                </tr>
                                <?php

                            }
                         }
                         else
                         {
                    ?>
                    <tr>
                        <td colspan="6">No Record Found!</td>
                    </tr>
                    <?php 
                     }
                    ?>
                </tbody>
            </table>

</div></div></div>
</div></div></div></div>
                    
</br></br></br></br></br></br>
<div>(মোঃ আবু হেনা মোস্তফা জামাল)</br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;উপমহাব্যবস্থাপক</div>

<script src="https://kit.fontawesome.com/605c1f1072.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: false,
        buttons: [ 'print' ]
    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );
    </script>

</body>
</html>
