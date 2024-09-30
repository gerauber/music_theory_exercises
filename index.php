<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Theory Exercises</title>
    <!-- <link rel="icon" href="../../figures/logo.svg" type="image/x-icon" /> -->
    <link rel="icon" href="pictures/logo.svg" type="image/x-icon" />
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <header>
        <h1><a href="index.php?page=home" style="text-decoration:none;">Music Theory Exercises</a></h1>
        <a href="https://github.com/gerauber"><img src="pictures/logo.svg" alt="Gege logo"></a>
    </header>

    <nav>
        <ul class="main-nav">
            <li class="has-sub-nav">
              Intervals
              <ul class="sub-nav">
                  <li><a href="index.php?page=intervals_theory">Interval Theory</a></li>
                  <li><a href="index.php?page=intervals_training">Intervals Training</a></li>
                  <li><a href="index.php?page=intervals_exercise">Interval Exercises</a></li>
              </ul>
            </li>
            <li class="has-sub-nav">
              Chords
              <ul class="sub-nav">
                  <li><a href="index.php?page=chords_theory">Chords Theory</a></li>
                  <li><a href="index.php?page=chords_training">Chords Training</a></li>
                  <li><a href="index.php?page=chords_exercise">Chords Exercises</a></li>
              </ul>
              </li>
            <li class="has-sub-nav">
              Cadences
              <ul class="sub-nav">
                  <li><a href="index.php?page=cadences_theory">Cadences Theory</a></li>
                  <li><a href="index.php?page=cadences_training">Cadences Training</a></li>
                  <li><a href="index.php?page=cadences_exercise">Cadences Exercises</a></li>
              </ul>
            </li> 
            <li class="has-sub-nav">
              Scales
              <ul class="sub-nav">
                  <li><a href="index.php?page=scales_theory">Scales Theory</a></li>
                  <li><a href="index.php?page=scales_training">Scales Training</a></li>
                  <li><a href="index.php?page=scales_exercise">Scales Exercises</a></li>
              </ul>
            </li>
            <li class="has-sub-nav">
              Rhythms
              <ul class="sub-nav">
                  <li><a href="index.php?page=rhythms_theory">Rhythms Theory</a></li>
                  <li><a href="index.php?page=rhythms_training">Rhythms Training</a></li>
                  <li><a href="index.php?page=rhythms_exercise">Rhythms Exercises</a></li>
              </ul>
            </li>
        </ul>
    </nav>

    <main>
        <?php
        // Check if 'page' is passed in the URL
        if (isset($_GET['page'])) {
            $page = $_GET['page'];

            // Display content based on the value of 'page'
            if ($page == 'home') {
                include('home.php');
            } elseif ($page == 'intervals_training') {
                include('sub_cats/intervals_training.php');
            } elseif ($page == 'intervals_theory') {
                include('sub_cats/intervals_theory.php');
            } elseif ($page == 'intervals_exercise') {
                include('sub_cats/intervals_exercise.php');
            } elseif ($page == 'chords_training') {
                include('sub_cats/chords_training.php');
            } elseif ($page == 'chords_theory') {
                include('sub_cats/chords_theory.php');
            } elseif ($page == 'chords_exercise') {
                include('sub_cats/chords_exercise.php');
            } elseif ($page == 'cadences_training') {
                include('sub_cats/cadences_training.php');
            } elseif ($page == 'cadences_theory') {
                include('sub_cats/cadences_theory.php');
            } elseif ($page == 'cadences_exercise') {
                include('sub_cats/cadences_exercise.php');
            } elseif ($page == 'scales_training') {
                include('sub_cats/scales_training.php');
            } elseif ($page == 'scales_theory') {
                include('sub_cats/scales_theory.php');
            } elseif ($page == 'scales_exercise') {
                include('sub_cats/scales_exercise.php');
            } elseif ($page == 'rhythms_training') {
                include('sub_cats/rhythms_training.php');
            } elseif ($page == 'rhythms_theory') {
                include('sub_cats/rhythms_theory.php');
            } elseif ($page == 'rhythms_exercise') {
                include('sub_cats/rhythms_exercise.php');
            } else {
                // Default case: if the 'page' value is unknown
                echo "<p>Error 404.</p>";
                echo "<h1>Page not found</h1>";
            }
        } else {
            include('home.php');
        }
        ?>

        

        <!-- <p> Example of </p>
        <audio controls>
          <source src="audio/cadences/cad_perf_2.mp3" type="audio/mp3" />
        </audio>     -->
        <!-- <form>
          <div><label for="name">Answer</label>
          <input type="text" id="name"></div>
        
          <div class="buttons"><input type="submit" value="Submit"></div>
        </form> -->
    </main>
</body>
<footer>
    <div class="footer-quote">
        <p>"Building harmony, one scale at a time."</p>
    </div>
    <div class="footer-contact">
        <p>Contact: <a href="mailto:g.raeuber@syntaxerror.ch">g.raeuber@syntaxerror.ch</a></p>
    </div>
    <div class="footer-copyright">
        <p>&copy; 2024 Music Theory Exercises. All rights reserved.</p>
    </div>
</footer>
</html>
