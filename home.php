<?php 
include('./quiz3/includes/config.inc.php'); // database configuration 

//connect to database
@$db = new mysqli($GLOBALS['DB_HOST'], $GLOBALS['DB_USERNAME'], $GLOBALS['DB_PASSWORD'], $GLOBALS['DB_NAME']);

if ($db->connect_error) {
   echo '<div class="messages">Could not connect to the database. Error: ';
   echo $db->connect_errno . ' - ' . $db->connect_error . '</div>';
} else {
   $dbOk = true;
}

include('./quiz3/includes/header.php'); //includes links to CSS, Java, jQuery
?>

<div class="home-flex">
  <div class="home-left">
    <div class="green">
      <h5>STUDENT @ RENSSELAER POLYTECHNIC INSTITUTE</h5>
  </div>
    <h3>Hello, my name is</h3>
    <div class="green">
      <h3>Nanami Chrysler</h3>
    </div>
    <p class="home">
      Class of 2028 pursuing a Dual Degree in Cognitive Science & Information Technology and Web Science, 
      with a minor in Marketing. Interested in exploring the intersection between human behavior and 
      technology. Fields of interest include marketing, consulting, and UX/UI.
    </p>
    <br>
    <br>
    <br>
      <a href="./contactMe/contactme.html" class="button cta">Contact</a>
      <a href="./projects/project.html" class="button">View Projects</a>
  </div>
  <div class="home-right">
    <img src="./resources/images/headshot.jpg" alt="Headshot" class="img-headshot">
  </div>
</div>
<div class="about-section">
  <p class="about-section-label">Background</p>
  <div class="about-cards-row">
    <div class="about-card">
      <p class="about-card-label">Hometown</p>
      <p class="about-card-value">Davis, CA</p>
    </div>
    <div class="about-card">
      <p class="about-card-label">Graduation</p>
      <p class="about-card-value">Class of 2028 </p>
    </div>
  </div>

  <hr class="about-divider">

  <p class="about-section-label">Extracurriculars</p>
  <div class="about-cards-row">
    <div class="about-card">
      <p class="about-card-label">Athletics</p>
      <p class="about-card-value">
        Women's Varsity <br>
        Swim & Dive
      </p>
    </div>
    <div class="about-card">
      <p class="about-card-label">Greek life</p>
      <p class="about-card-value">Alpha Phi Fraternity</p>
    </div>
    <div class="about-card">
      <p class="about-card-label">Clubs/Organizations</p>
      <span class="about-tag">Rensselaer Consulting Club</span>
      <span class="about-tag">ACM-W</span>
      <span class="about-tag">I-Persist Mentoring</span>
    </div>
    <div class="about-card">
      <p class="about-card-label">Achievements</p>
        <p class="about-card-value">
          Dean's Honor List <br>
          (Fall 2024 - Present)
        </p>
        <p class="about-card-value">Epsilon Delta Sigma</p>
        <p class="about-card-value">Gamma Nu Eta</p>     
    </div>
  </div>

  <hr class="about-divider">

  <p class="about-section-label">Skills</p>
  <div class="about-card">
    <p class="about-card-label">Technical</p>
    <span class="about-tag blue">HTML</span>
    <span class="about-tag blue">CSS</span>
    <span class="about-tag blue">SQL</span>
    <span class="about-tag blue">Python</span>
    <span class="about-tag blue">C++</span>
    <span class="about-tag blue">C</span>
    <span class="about-tag blue">JavaScript</span>
    <span class="about-tag blue">jQuery</span>
    <span class="about-tag blue">R</span>

    <p class="about-card-label">Tools</p>
    <span class="about-tag blue">Figma</span>
    <span class="about-tag blue">Balsamiq</span>
    <span class="about-tag blue">Microsoft 365 Suite</span>
    <span class="about-tag blue">Google Suite</span>
    <span class="about-tag blue">Canva</span>
    <span class="about-tag blue">Latex</span>
    <span class="about-tag blue">Mailchimp</span>
    <span class="about-tag blue">HubSpot</span>
  </div>

  <hr class="about-divider">

  <div class="about-photos">
    <img src="./resources/images/athletic headshot.JPG" alt="Professional headshot">
    <img src="./resources/images/action shot.JPG" alt="Athletic headshot">
    <img src="./resources/images/awards.JPEG" alt="Induction Ceremony to EDS and Gamma Nu Eta">
  </div>

</div>
<!--comment form, assisted by ChatGPT -->
<h4>What Did You Think of My Website? Please Share Your Thoughts in the Comments!</h4>
<div id="commentBox">
  <form id="commentForm" action="./quiz3/submit_comment.php" method="POST">
    <div class="comment-fields">
          <input type="text" id="name" name="name" class="comment-field" placeholder="Name" required>
          <input type="email" id="email" name="email" class="comment-field" placeholder="Email" required>
    </div>
    <textarea id="comment" name="comment" class="comment-input" required placeholder="Add a comment..."></textarea>
    <button type="submit" class="comment-submit">Comment</button>
  </form>
</div>
<?php
if ($dbOk) { //connected to database
  //retrieve approved comments & order them by newest comments first
  $query = "SELECT visitorName, email, comment, timestamp 
            FROM siteComments 
            WHERE status = 'approved'
            ORDER BY timestamp DESC";

  $stmt = $db->prepare($query);
  $stmt->execute();
  $result = $stmt->get_result(); //stores all of the approved ocmments

  //display approved comments if there are any, display message if none are approved yet
  if ($result->num_rows === 0) {
    echo '<div class="commentApproved">';
    echo "<p>No comments yet — be the first to leave one!</p>";
    echo '</div>';
  } else {
    while ($row = $result->fetch_assoc()) {
      echo '<div class="commentApproved">';
      echo '<strong>' . htmlspecialchars($row['visitorName']) . '</strong><br>';
      echo '<em>' . htmlspecialchars($row['timestamp']) . '</em><br>';
      echo '<p>' . nl2br(htmlspecialchars($row['comment'])) . '</p>';
      echo '</div>';
    }
  }
  $stmt->close();
}
?>
<br>
<footer class="footer">
      <div class="footer-content" id="footer-content"></div>
</footer>
<?php include('./quiz3/includes/footer.php') ?>