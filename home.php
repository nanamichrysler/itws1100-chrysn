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

<div class="banner">
  <a href=home.php><h1>Nanami Chrysler</h1></a>
  <div class="nav-links">
    <a href="home.php" class="button cta">Home</a> 
    <a href="./aboutMe/aboutme.html" class="button cta">About Me</a>
    <a href="./labs/labs.html" class="button cta">Labs</a>
    <a href="./projects/project.html" class="button cta">Projects</a>
    <a href="./contactMe/contactme.html" class="button cta">Contact Me</a>
  </div>
</div>
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

  <div class="about-bio-card">
    <img src="./resources/images/headshot.jpg" alt="Headshot">
    <div class="about-bio-text">
      <h3>Nanami Chrysler</h3>
      <p>Class of 2028 pursuing a Dual Degree in Cognitive Science & ITWS, 
      with a minor in Marketing...</p>
    </div>
  </div>

  <p class="about-section-label">Background</p>
  <div class="about-cards-row">
    <div class="about-card">
      <p class="about-card-label">Hometown</p>
      <p class="about-card-value">Davis, CA</p>
    </div>
    <div class="about-card">
      <p class="about-card-label">Graduation</p>
      <p class="about-card-value">Class of 2028</p>
    </div>
  </div>

  <hr class="about-divider">

  <p class="about-section-label">Extracurriculars</p>
  <div class="about-cards-row">
    <div class="about-card">
      <p class="about-card-label">Athletics</p>
      <p class="about-card-value">Women's Varsity Swim & Dive</p>
    </div>
    <div class="about-card">
      <p class="about-card-label">Greek life</p>
      <p class="about-card-value">Alpha Phi Fraternity</p>
    </div>
    <div class="about-card">
      <p class="about-card-label">Clubs</p>
      <span class="about-tag">Rensselaer Consulting Club</span>
      <span class="about-tag">ACM-W</span>
      <span class="about-tag">SASE</span>
    </div>
  </div>

  <hr class="about-divider">

  <p class="about-section-label">Skills</p>
  <div class="about-card">
    <p class="about-card-label">Technical</p>
    <span class="about-tag blue">Python</span>
    <span class="about-tag blue">C++</span>
    <span class="about-tag blue">HTML</span>
    <span class="about-tag blue">CSS</span>
    <span class="about-tag blue">Figma</span>
  </div>

  <hr class="about-divider">

  <p class="about-section-label">Photos</p>
  <div class="about-photos">
    <img src="./resources/images/headshot.jpg" alt="Professional headshot">
    <img src="./resources/images/athletic-headshot.jpg" alt="Athletic headshot">
    <img src="./resources/images/another.jpg" alt="...">
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

  <!-- Main footer -->
  <div class="footer-content">

    <!-- About -->
    <div class="footer-section">
      <h4>Nanami Chrysler</h4>
      <p>
        ITWS & Cognitive Science student focused on web development, UX, and consulting.
      </p>
    </div>

    <!-- Classes -->
    <div class="footer-section">
      <a href="../classes/classes.html"><h4>Classes</h4></a>
    </div>

    <!-- Projects -->
    <div class="footer-section">
      <a href="../projects/project.html"><h4>Projects</h4></a>
    </div>

    <!-- Contact -->
    <div class="footer-section">
      <a href="../contactMe/contactme.html"><h4>Contact Me</h4></a>
      <p><strong>Email:</strong> nanami.jc73@gmail.com</p>
      <p><strong>Phone:</strong> (530) 219-4452</p>
    </div>
  </div>
</footer>
<?php include('./quiz3/includes/footer.php') ?>