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

    require 'TylerToponce_assessment_conn.php';

    $mysqli = new mysqli("localhost", "localhost1", "localhost", "fashionphile");
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    $getinfo_jobname = "SELECT name FROM jobs WHERE id = '$jobId'";
    $getinfo_applicantname = "SELECT name FROM applicants WHERE id = '$applicantId'";
    $getinfo_applicantemail = "SELECT email FROM applicants WHERE id = '$applicantId'";
    $getinfo_applicantwebsite = "SELECT website FROM applicants WHERE id = '$applicantId'";
    $getinfo_coverletter = "SELECT cover_letter FROM applicants WHERE id = '$applicantId'";
    $getinfo_skill = "SELECT name FROM skills WHERE id = '$applicantID'";

  ?>

    <div id="page">
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
            <td rowspan="10" class="job-name" value="<?= $getinfo_jobname ?>"></td>
            <td rowspan="3" class="applicant-name" value="<?= $getinfo_applicantname ?>"></td>
            <td rowspan="3"><a href="mailto:kaitlin@lesch.co.uk">kaitlin@lesch.co.uk</a></td>
            <td rowspan="3"><a href="http://berge.biz/">berge.biz</td>
            <td>Ruby</td>
            <td rowspan="3">Deleniti debitis soluta magni ipsum perspiciatis in itaque eligendi. Modi quidem qui nisi autem vel. Iste non quia dolores quo excepturi corrupti et nobis.</td>
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