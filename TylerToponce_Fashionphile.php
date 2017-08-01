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

    $conn = new mysqli("localhost", "localhost1", "localhost", "fashionphile");
    
    if (mysqli_connect_errno()) {
        printf("Connection failed: %s\n", mysqli_connect_error());
        exit();
    }

    $getinfo_job = "SELECT name FROM jobs";
    $job_result = $conn->query($getinfo_job);
    $job_result_array = mysqli_fetch_array($job_result, MYSQLI_NUM);

    $getinfo_applicant = "SELECT name FROM applicants";

    $getinfo_applicant_webdeveloper = 
      "SELECT j.id, a.name, a.email, a.website, a.cover_letter
       FROM applicants a
       JOIN jobs j ON a.job_id = j.id
       WHERE j.id = 1";
    $result_developer = $conn->query($getinfo_applicant_webdeveloper);
    $application_webdeveloper_arr = $result_developer->fetch_assoc();

    $getinfo_applicant_designer = 
      "SELECT j.id, a.name, a.email, a.website, a.cover_letter
       FROM applicants a
       JOIN jobs j ON a.job_id = j.id
       WHERE j.id = 2";
    $result_designer = $conn->query($getinfo_applicant_designer);
    $application_designer_arr = $result_designer->fetch_assoc();

    $skills_arr_rowcount_perapplicant = "SELECT COUNT(*) FROM skills s JOIN applicants a ON a.id = s.applicant_id WHERE s.applicant_id = a.id";

    $skills_toprowname = "SELECT s.name FROM skills s JOIN applicants a ON a.id = s.applicant_id";
    $skills_toprowname_result = $conn->query($skills_toprowname);
    $skillslist_array = mysqli_fetch_array($skills_toprowname_result, MYSQLI_NUM);

    $skills_distinct_count = "SELECT COUNT(DISTINCT name) FROM skills";

    $applicants_distinct_count = "SELECT COUNT(DISTINCT name) FROM applicants";

    if ($getinfo_applicant->num_rows > 0) {
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

      for ($i = 0; $application_webdeveloper_arr[$i] = $result_developer->fetch_assoc(); $i++) {
        echo '<td rowspan="' . $skills_arr_rowcount_perapplicant . '" class="applicant-name">' . $application_webdeveloper_arr['name'] . '</td>
              <td rowspan="' . $skills_arr_rowcount_perapplicant . '"><a href="mailto:kaitlin@lesch.co.uk">' . $application_webdeveloper_arr['email'] . '</a></td>
              <td rowspan="' . $skills_arr_rowcount_perapplicant . '"><a href="http://berge.biz/">' . $application_arr['website'] . '</a></td>
              <td>' . $skillslist_array[0] . '</td>
              <td rowspan="' . $skills_arr_rowcount_perapplicant . '">' . $application_arr['cover_letter'] . '</td>
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

      for ($i = 0; $application_designer_arr[$i] = $result_designer->fetch_assoc(); $i++) {
        echo '<td rowspan="' . $skills_arr_rowcount_perapplicant . '" class="applicant-name">' . $application_designer_arr['name'] . '</td>
              <td rowspan="' . $skills_arr_rowcount_perapplicant . '"><a href="mailto:kaitlin@lesch.co.uk">' . $application_designer_arr['email'] . '</a></td>
              <td rowspan="' . $skills_arr_rowcount_perapplicant . '"><a href="http://berge.biz/">' . $application_designer_arr['website'] . '</a></td>
              <td>' . $skillslist_array[0] . '</td>
              <td rowspan="' . $skills_arr_rowcount_perapplicant . '">' . $application_designer_arr['cover_letter'] . '</td>
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
      }

      echo '<!-- /Designer -->
            </tbody>
            <tfooter>
              <tr>
                <td colspan="6">' . $applicants_distinct_count . 'Applicants, ' . $skills_distinct_count . 'Unique Skills</td>
              </tr>
            </tfooter>
          </table>
        </div>';

    }

    $conn->close();

  ?>
  </body>
</html>