<?php 

$conn = mysqli_connect("localhost", "root", "", "jbl");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php include ("nav.php"); ?>
<p>সূত্র: এমকিউ/ সার্ভার নিরাপত্তা নাইট/ ডিসেম্বর-২০২২ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;তারিখ: ৩০/১১/২০২২</p> 
</br> <center><h4><u>অফিস নির্দেশ</u></h4></center>
    <p>
অত্র ডিপার্টমেন্টে সংরক্ষিত সার্ভার সমূহ এবং কম্পিউটার সামগ্রীর ২৪ ঘণ্টা নিরবিচ্ছিন্ন নিরাপত্তা নিশ্চিতকরণের লক্ষ্যে ডিসেম্বর ২০২২(০১-৩১ তারিখ পর্যন্ত) মাসের রাত্রিকালীন শিফটে (রাত ৮ টা হতে সকাল ৮ টা পর্যন্ত) নিম্নবর্ণিত কর্মকর্তাদের পাশে বর্ণিত তারিখ অনুযায়ী উপস্থিত থেকে দায়িত্ব পালন করার জন্য নির্দেশ প্রদান করা হলো।</p>
<div class="dashboard flex-grow-1">
        <div class="dash_headline d-flex bg-blue pb-5">
          
          
        </div>
        <div class="container-fluid px-4">
        <div class="row at-4">
            <div class="col-md-12">
                <div class="card">
                <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Duty ID</th>
                        <th>Employee ID</th>
                        <th>Shift ID</th>
                        <th>Date</th>
                        <th>Time</th> 
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
                                    <td><?= $post['Time'] ?></td>
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

                    <tr>

                    </tr>


                </tbody>
            </table>
        </div>
    </div>
    </div>
 </div>
</div>
</div>
      </div>
    </div>

    <script src="https://kit.fontawesome.com/605c1f1072.js" crossorigin="anonymous"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
      
    ></script>
  </body>
</html>