<!DOCTYPE html>
<html>
  <head>
    <title>Job Applicants Report</title>
    <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.9.1/build/cssreset/cssreset-min.css">
    <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.9.1/build/cssbase/cssbase-min.css">
    <style type="text/css">
      #page {
        width: 1200px;
        margin: 30px auto;
      }
      .job-applicants {
        width: 100%;
      }
      .job-name {
        text-align: center;
      }
      .applicant-name {
        width: 150px;
      }
    </style>
  </head>
  <body>

  <?php

    // Connecting to the database
    $conn = new mysqli("localhost", "localhost1", "localhost", "fashionphile");
    
    if (mysqli_connect_errno()) {
        printf("Connection failed: %s\n", mysqli_connect_error());
        exit();
    }

    // Setting up the Laravel Controller
    // namespace App\Http\Controllers;

    // use Illuminate\Support\Facades\DB;
    // use App\Http\Controllers\Controller;

    // class UserController extends Controller
    // {
    //   public function index()
    //   {
    //     $applicants = DB::table('applicants')->get();

    //     return view('applicant.index', ['applicants' => $applicants]);
    //   }
    // }

    // Pull the data from the database
    $getinfo_applicant = "SELECT name FROM applicants";
    $result = $conn->query($getinfo_applicant);
    $applicant_arr = $result->fetch_assoc();

    $getinfo_applicant_webdeveloper = 
      "SELECT j.id, a.id, a.name, a.email, a.website, a.cover_letter
       FROM applicants a
       JOIN jobs j ON a.job_id = j.id
       WHERE j.id = 1";
    $result_developer = $conn->query($getinfo_applicant_webdeveloper);
    $application_webdeveloper_arr = $result_developer->fetch_assoc();

    $getinfo_applicant_designer = 
      "SELECT j.id, a.id, a.name, a.email, a.website, a.cover_letter
       FROM applicants a
       JOIN jobs j ON a.job_id = j.id
       WHERE j.id = 2";
    $result_designer = $conn->query($getinfo_applicant_designer);
    $application_designer_arr = $result_designer->fetch_assoc();

    $skills_arr_rowcount_perapplicant = "SELECT COUNT(s.name) FROM skills s JOIN applicants a ON a.id = s.applicant_id WHERE s.applicant_id = a.id";
    $result_count_1 = $conn->query($skills_arr_rowcount_perapplicant);
    $skills_count1_array = mysqli_fetch_array($result_count_1, MYSQLI_NUM);
    $skills_finalcount = $skills_count1_array[0];

    $skills_distinct_count = "SELECT COUNT(DISTINCT name) FROM skills";
    $result_count_2 = $conn->query($skills_distinct_count);
    $skills_count2_array = mysqli_fetch_array($result_count_2, MYSQLI_NUM);
    $skills_totalskills = $skills_count2_array[0];

    $applicants_distinct_count = "SELECT COUNT(DISTINCT name) FROM applicants";
    $result_count_3 = $conn->query($applicants_distinct_count);
    $applicants_count_array = mysqli_fetch_array($result_count_3, MYSQLI_NUM);
    $applicants_totalskills = $applicants_count_array[0];

    // Display the data pulled
    if (!empty($applicant_arr)) {
      echo '<div id="page">
      <table class="job-applicants">
        <thead>
          <tr>
            <th>Job</th>
            <th>Applicant Name</th>
            <th>Email Address</th>
            <th>Website</th>
            <th>Skills</th>
            <th>Cover Letter Paragraph</th>
          </tr>
        </thead>

        <tbody>
            <!-- Web Developer -->
            <tr>
              <td rowspan="10" class="job-name">Web Developer</td>';

      $app_developer_arr_rowcount = mysqli_num_rows($application_developer_arr);

      for ($i = 0; $application_developer_arr[$i] <= $app_developer_arr_rowcount; $i++) {
        echo '<td rowspan="' . $skills_finalcount . '" class="applicant-name">' . $application_webdeveloper_arr['name'] . '</td>
              <td rowspan="' . $skills_finalcount . '"><a href="mailto:kaitlin@lesch.co.uk">' . $application_webdeveloper_arr['email'] . '</a></td>
              <td rowspan="' . $skills_finalcount . '"><a href="http://berge.biz/">' . $application_webdeveloper_arr['website'] . '</a></td>';

              $skills_toprowname = "SELECT s.name FROM skills s JOIN applicants a ON a.id = s.applicant_id WHERE s.applicant_id = a.id";
              $skills_toprowname_result = $conn->query($skills_toprowname);
              $skillslist_array = mysqli_fetch_array($skills_toprowname_result, MYSQLI_NUM);

        echo  '<td>' . $skillslist_array[0] . '</td>
              <td rowspan="' . $skills_finalcount . '">' . $application_webdeveloper_arr['cover_letter'] . '</td>
            </tr>';

                  if (count($skillslist_array) > 1) {
                    $count = count($skillslist_array) - 1;
                    for ($i = 1; $i <= $count; $i++) {
                      echo  '<tr>
                              <td>' . $skillslist_array[i] . '</td>
                            </tr>';
                    }
                  }

        echo '<tr>';
        array_pop($application_webdeveloper_arr);
      }
      echo '<!-- /Web Developer --><!-- Designer -->

            <td rowspan="12" class="job-name">Designer</td>';

      $app_designer_arr_rowcount = mysqli_num_rows($application_designer_arr);

      for ($i = 0; $application_designer_arr[$i] <= $app_designer_arr_rowcount; $i++) {
        echo '<td rowspan="' . $skills_finalcount . '" class="applicant-name">' . $application_designer_arr['name'] . '</td>
              <td rowspan="' . $skills_finalcount . '"><a href="mailto:kaitlin@lesch.co.uk">' . $application_designer_arr['email'] . '</a></td>
              <td rowspan="' . $skills_finalcount . '"><a href="http://berge.biz/">' . $application_designer_arr['website'] . '</a></td>';

              $skills_toprowname = "SELECT s.name FROM skills s JOIN applicants a ON a.id = s.applicant_id WHERE s.applicant_id = a.id";
              $skills_toprowname_result = $conn->query($skills_toprowname);
              $skillslist_array = mysqli_fetch_array($skills_toprowname_result, MYSQLI_NUM);

        echo  '<td>' . $skillslist_array[0] . '</td>
              <td rowspan="' . $skills_finalcount . '">' . $application_designer_arr['cover_letter'] . '</td>
            </tr>';

                  if (count($skillslist_array) > 1) {
                    $count = count($skillslist_array) - 1;
                    for ($i = 1; $i <= $count; $i++) {
                      echo '<tr>
                              <td>' . $skillslist_array[i] . '</td>
                            </tr>';
                    }
                  }

        echo '<tr>';
        array_pop($application_designer_arr);
      }

      echo '<!-- /Designer -->
            </tbody>
            <tfooter>
              <tr>
                <td colspan="6">' . $applicants_totalskills . ' Applicants, ' . $skills_totalskills . ' Unique Skills</td>
              </tr>
            </tfooter>
          </table>
        </div>';

    }

    // Close the connection to the database
    $conn->close();

  ?>
  </body>
</html>