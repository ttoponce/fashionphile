<!DOCTYPE html>
<html>
  <head>
    <title>Job Applicants Report | Tyler Toponce PHP Assessment</title>
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

    $getinfo_applicant_webdeveloper = 
      "SELECT j.id, a.name, a.email, a.website, a.cover_letter
       FROM applicants a
       JOIN jobs j ON a.job_id = j.id
       WHERE j.id = 1";
    $result = $conn->query($getinfo_applicant_webdeveloper);
    $application_webdeveloper_arr = $result->fetch_assoc();

    $getinfo_applicant_designer = 
      "SELECT j.id, a.name, a.email, a.website, a.cover_letter
       FROM applicants a
       JOIN jobs j ON a.job_id = j.id
       WHERE j.id = 2";
    $result = $conn->query($getinfo_applicant_designer);
    $application_designer_arr = $result->fetch_assoc();

    $skills_arr_rowcount_perapplicant = "SELECT COUNT(*) FROM skills s JOIN applicants a ON a.id = s.applicant_id WHERE s.applicant_id = a.id";

    $skills_toprowname = "SELECT s.name FROM skills s JOIN applicants a ON a.id = s.applicant_id";
    $skills_toprowname_result = $conn->query($skills_toprowname);
    $skillslist_array = mysqli_fetch_array($skills_toprowname_result, MYSQLI_NUM);

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
            <tr>
              <td rowspan="10" class="job-name">Web Developer</td>'

      while ($application_webdeveloper_arr[]) {
        echo '<td rowspan="' . $skills_arr_rowcount_perapplicant . '" class="applicant-name">' . $application_webdeveloper_arr['name'] . '</td>
              <td rowspan="' . $skills_arr_rowcount_perapplicant . '"><a href="mailto:kaitlin@lesch.co.uk">' . $application_webdeveloper_arr['email'] . '</a></td>
              <td rowspan="' . $skills_arr_rowcount_perapplicant . '"><a href="http://berge.biz/">' . $application_arr['website'] . '</a></td>
              <td>' . $skillslist_array[0] . '</td>
              <td rowspan="' . $skills_arr_rowcount_perapplicant . '">' . $application_arr['cover_letter'] . '</td>
            </tr>'

                  if (count($skillslist_array) > 1) {
                    for ($i = 1; $count = count($skillslist_array) - 1; $i <= $count; $i++) {
                      echo  . '<tr>
                              <td>' . $skillslist_array[i] . '</td>
                            </tr>' . ;
                    }
                  }

              '<tr>'
      }

      echo '<td rowspan="12" class="job-name">Designer</td>';

      while ($application_designer_arr[]) {
        echo '<td rowspan="' . $skills_arr_rowcount_perapplicant . '" class="applicant-name">' . $application_designer_arr['name'] . '</td>
              <td rowspan="' . $skills_arr_rowcount_perapplicant . '"><a href="mailto:kaitlin@lesch.co.uk">' . $application_designer_arr['email'] . '</a></td>
              <td rowspan="' . $skills_arr_rowcount_perapplicant . '"><a href="http://berge.biz/">' . $application_designer_arr['website'] . '</a></td>
              <td>' . $skillslist_array[0] . '</td>
              <td rowspan="' . $skills_arr_rowcount_perapplicant . '">' . $application_designer_arr['cover_letter'] . '</td>
            </tr>'

                  if (count($skillslist_array) > 1) {
                    for ($i = 1; $count = count($skillslist_array) - 1; $i <= $count; $i++) {
                      echo  . '<tr>
                              <td>' . $skillslist_array[i] . '</td>
                            </tr>' . ;
                    }
                  }

              '<tr>'
      }

    }

    $conn->close();

  ?>

    <!-- <div id="page">
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

        <tbody> -->
          <!-- Web Developer -->
          <tr>
            <td rowspan="10" class="job-name" value="<?= $application_arr["j.name"] ?>"></td>
            <td rowspan="3" class="applicant-name" value="<?= $application_arr["a.name"] ?>"></td>
            <td rowspan="3"><a href="mailto:kaitlin@lesch.co.uk" value="<?= $application_arr["a.email"] ?>"></a></td>
            <td rowspan="3"><a href="http://berge.biz/" value="<?= $application_arr["a.website"] ?>"></a></td>
            <td>Ruby</td>
            <td rowspan="3" value="<?= $application_arr["a.cover_letter "] ?>"></td>
          </tr>
          <tr>
            <td>PHP</td>
          </tr>
          <tr>
            <td>Javascript</td>
          </tr>
          <tr>
            <td rowspan="2" class="applicant-name">Camila Walsh</td>
            <td rowspan="2"><a href="mailto:berneice@turner.biz">berneice@turner.biz</a></td>
            <td rowspan="2">---</td>
            <td>PHP</td>
            <td rowspan="2">Et rerum nihil saepe excepturi cumque. Pariatur illo nihil inventore est ipsam. Quam voluptate aperiam sunt et nihil exercitationem dolore. Vitae dolor et accusamus vero et velit eligendi qui. Ut qui aliquam dolor.</td>
          </tr>
          <tr>
            <td>Java</td>
          </tr>
          <tr>
            <td rowspan="2" class="applicant-name">Simeon Connelly</td>
            <td rowspan="2"><a href="mailto:vicenta.swift@stantonmiller.info">vicenta.swift@stantonmiller.info</a></td>
            <td rowspan="2"><a href="http://monahanwehner.us/">monahanwehner.us</td>
            <td>Python</td>
            <td rowspan="2">Voluptatem dolor explicabo quos omnis eum velit optio est. Voluptatum exercitationem placeat ea molestiae esse eum saepe earum. Unde deleniti mollitia molestiae maiores laborum corrupti cupiditate. Perspiciatis alias amet porro beatae omnis voluptatum officia quia. Quaerat quasi et suscipit.</td>
          </tr>
          <tr>
            <td>C</td>
          </tr>
          <tr>
            <td rowspan="3" class="applicant-name">Vernice Watsicay</td>
            <td rowspan="3"><a href="mailto:jaylon@hoeger.biz">jaylon@hoeger.biz</a></td>
            <td rowspan="3"><a href="http://hegmann.biz/">hegmann.biz</td>
            <td>C++</td>
            <td rowspan="3">Quidem impedit et voluptatem. Cum nisi rem ut autem in qui veritatis alias. Harum mollitia et delectus nihil facilis. Cumque asperiores eum culpa sed. Minima sapiente molestiae atque dolorem et.</td>
          </tr>
          <tr>
            <td>Java</td>
          </tr>
          <tr>
            <td>Lisp</td>
          </tr>
          <!-- /Web Developer -->

          <!-- Designer -->
          <tr>
            <td rowspan="12" class="job-name">Designer</td>
            <td rowspan="3" class="applicant-name">Demetrius O'Reilly</td>
            <td rowspan="3"><a href="mailto:johan@hayes.biz">johan@hayes.biz</a></td>
            <td rowspan="3"><a href="http://hayes.ca/">hayes.ca</td>
            <td>Fireworks</td>
            <td rowspan="3">Dignissimos debitis iste optio minus. Illum molestiae eius nam mollitia iure voluptatem eaque quis. Omnis deserunt aut tempora. Soluta ab ullam dignissimos quia. Ea ducimus earum quae voluptate.</td>
          </tr>
          <tr>
            <td>Illustrator</td>
          </tr>
          <tr>
            <td>Photoshop</td>
          </tr>
          <tr>
            <td rowspan="3" class="applicant-name">Miss Bonnie Kihn</td>
            <td rowspan="3"><a href="mailto:korbin@balistrerigleason.uk">korbin@balistrerigleason.uk</a></td>
            <td rowspan="3"><a href="http://block.com/">block.com</td>
            <td>Photoshop</td>
            <td rowspan="3">Illo sequi minus veritatis similique. Enim voluptas dicta velit quo. Sapiente architecto a nihil qui fuga. Voluptas cupiditate eos rerum et.</td>
          </tr>
          <tr>
            <td>Fireworks</td>
          </tr>
          <tr>
            <td>Illustrator</td>
          </tr>
          <tr>
            <td rowspan="3" class="applicant-name">Mrs. Alexis Lebsack</td>
            <td rowspan="3"><a href="mailto:guadalupe.glover@crona.info">guadalupe.glover@crona.info</a></td>
            <td rowspan="3"><a href="http://gusikowskibogisich.us/">gusikowskibogisich.us</td>
            <td>Photoshop</td>
            <td rowspan="3">Molestiae culpa eum vel deleniti quia laboriosam sed. Necessitatibus quo ut eos dignissimos sint et dolores. Vitae non nihil beatae reiciendis. Itaque quis quibusdam a deleniti iusto ullam quo perferendis.</td>
          </tr>
          <tr>
            <td>Fireworks</td>
          </tr>
          <tr>
            <td>Illustrator</td>
          </tr>
          <tr>
            <td rowspan="3" class="applicant-name">Micah Orn</td>
            <td rowspan="3"><a href="mailto:hunter.hudson@yundt.uk">hunter.hudson@yundt.uk</a></td>
            <td rowspan="3"><a href="http://kihnmosciski.uk/">kihnmosciski.uk</td>
            <td>Photoshop</td>
            <td rowspan="3">Maxime a est iure id fugiat dolorem aut non. Est qui sit id facere. Quam nemo non aut. Explicabo accusantium iusto optio doloremque quidem sed. Praesentium perferendis aliquam impedit quod.</td>
          </tr>
          <tr>
            <td>Fireworks</td>
          </tr>
          <tr>
            <td>Illustrator</td>
          </tr>
          <!-- /Designer -->

        </tbody>

        <tfooter>
          <tr>
            <td colspan="6">8 Applicants, 11 Unique Skills</td>
          </tr>
        </tfooter>
      </table>
    </div>
  </body>
</html>