<?php
session_start();
include "dataBase.php";
include "models/media.php";


//******** PROTECT PAGE FROM UNAUTHORIZED ACCESS ************
// Check if user is logged in
if (isset($_SESSION['user_id'])) {
  // if yes, do nothing
} else {
  // if no, go to index page
  header("Location: index.php");
}
//*************************************************************


$user_id = $_SESSION['user_id'];

$uploads_dir = "uploads/";
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home / Instagram</title>

  <link href="./fonts/material-icons/icons.css?123" rel="stylesheet" />

  <link rel="stylesheet" href="node_modules/reset.css/reset.css" />

  <link rel="stylesheet" href="css/style.css?123" />

  <link rel="icon" href="favicon.png?123" />
</head>

<body>
  <!-- nav bar starts -->
  <nav>
    <div class="nav_logo-wrapper">
      <img src="./images/instagram.png" alt="" srcset="" class="logo">
    </div>

    <div class="Menu_options active">
      <span class="material-icons">home</span>
      <h2>Home</h2>
    </div>

    <div class="Menu_options">
      <span class="material-icons">tag</span>
      <h2>Explore</h2>
    </div>

    <div class="Menu_options">
      <span class="material-icons">notifications</span>
      <h2>Notification</h2>
    </div>

    <div class="Menu_options">
      <span class="material-icons">email</span>
      <h2>Messages</h2>
    </div>

    <div class="Menu_options">
      <span class="material-icons">send</span>
      <h2>Reels</h2>
    </div>

    <a href="profile.php">
      <div class="Menu_options">
        <span class="material-icons">person</span>
        <h2>Profile</h2>
      </div>
    </a>
    <div class="Menu_options active">
      <span class="material-icons">add_circle</span>
      <h2><a href="upload.php">Post (Upload a File)</a></h2>
    </div>

    <div class="Menu_options">
      <span class="material-icons">more_horiz</span>
      <h2>More</h2>
    </div>

    <!-- <button class="tweet_btn">Post</button> -->

    <div class="logout">
      <a href="logout.php">
        <h2>Log Out</h2>
      </a>
    </div>
  </nav>
  <!-- nav bar end -->

  <!-- main section start -->
  <main>
    <div class="stories">
      <div class="circle_body">
        <div class="circle">
          <div class="circle_inner"></div>
        </div>
        <div class="post_header-text">
          <h3>
            Danny
            <span class="header-icon-section">
              <span class="material-icons post_badge">verified</span>
            </span>
          </h3>
        </div>
      </div>
      <div class="circle_body">
        <div class="circle">
          <div class="circle_inner"></div>
        </div>
        <div class="post_header-text">
          <h3>
            Michael
            <span class="header-icon-section">
              <span class="material-icons post_badge">verified</span>
            </span>
          </h3>
        </div>
      </div>
      <div class="circle_body">
        <div class="circle">
          <div class="circle_inner"></div>
        </div>
        <div class="post_header-text">
          <h3>
            Ayra
            <span class="header-icon-section">
              <span class="material-icons post_badge">verified</span>
            </span>
          </h3>
        </div>
      </div>
      <div class="circle_body">
        <div class="circle">
          <div class="circle_inner"></div>
        </div>
        <div class="post_header-text">
          <h3>
            Java
            <span class="header-icon-section">
              <span class="material-icons post_badge">verified</span>
            </span>
          </h3>
        </div>
      </div>
      <div class="circle_body">
        <div class="circle">
          <div class="circle_inner"></div>
        </div>
        <div class="post_header-text">
          <h3>
            Java
            <span class="header-icon-section">
              <span class="material-icons post_badge">verified</span>
            </span>
          </h3>
        </div>
      </div>
      <div class="circle_body">
        <div class="circle">
          <div class="circle_inner"></div>
        </div>
        <div class="post_header-text">
          <h3>
            Java
            <span class="header-icon-section">
              <span class="material-icons post_badge">verified</span>
            </span>
          </h3>
        </div>
      </div>
    </div>
    <?php
    $med = new Media($conn);

    $rows = $med->readRecord($user_id);
    if ($rows !== false) {
      foreach ($rows as $key => $val) {
        $record_id = $val['id'];
        $real_file_name = $val['id'] . "." . $val['extension'];
        $original_file_name = $val['filename'];

        echo "<div class='post'>";
        echo "<div class='post_profile-image'>";
        echo "<img src='". $uploads_dir . $real_file_name . "' alt='java-logo' />";
        echo "</div>";
        echo "<div class='post_body'>";
        echo "<div class='post_header'>";
        echo "<div class='post_header-text'>";
        echo "<h3>";
        echo "Java";
        echo "<span class='header-icon-section'>";
        echo " <span class='material-icons post_badge'>verified</span>@java";
        echo " </span>";
        echo "</h3>";
        echo "</div>";

        echo "<img src=' ". $uploads_dir . $real_file_name ." ' alt='java18' />";
        echo "</div>";

        echo "<div class='post_footer'>";
        echo " <span class='material-icons'>favorite_border</span>";
        echo " <span class='material-icons'>comment</span>";
        echo "<span class='material-icons'>send</span>";
        echo "</div>";
        echo "<p class='likes'>17,876 likes</p>";
        echo " <div class='post_header-discription'>";
        echo "<div class='post_header-text'>";
        echo " <h3>";
        echo "Java";
        echo "</h3>";
        echo "</div>";
        echo "<p>Java 18 is now available! #Java18 #JDK18 #openjdk</p>";
        echo "<p class='comments'>View all 2354 comments</p>";
        echo "<p>";
        echo "Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum";
        echo "</p>";
        echo "</div>";
        echo "</div>";
        echo "</div>";

      }
    }
    ?>
    <!-- </div> -->
    <div class="post">
      <div class="post_profile-image">
        <img src="images/page-profile-image.jpg" alt="java-logo" />
      </div>
      <div class="post_body">
        <div class="post_header">
          <div class="post_header-text">
            <h3>
              Java
              <span class="header-icon-section">
                <span class="material-icons post_badge">verified</span>@java
              </span>
            </h3>
          </div>

          <img src="images/post-image.jpg" alt="java18" />
        </div>

        <div class="post_footer">
          <span class="material-icons">favorite_border</span>
          <span class="material-icons">comment</span>
          <span class="material-icons">send</span>
        </div>
        <p class="likes">17,876 likes</p>
        <div class="post_header-discription">
          <div class="post_header-text">
            <h3>
              Java
            </h3>
          </div>
          <p>Java 18 is now available! #Java18 #JDK18 #openjdk</p>
          <p class="comments">View all 2354 comments</p>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum
          </p>
        </div>
      </div>
    </div>
    <div class="post">
      <div class="post_profile-image">
        <img src="images/page-profile-image.jpg" alt="java-logo" />
      </div>
      <div class="post_body">
        <div class="post_header">
          <div class="post_header-text">
            <h3>
              Java
              <span class="header-icon-section">
                <span class="material-icons post_badge">verified</span>@java
              </span>
            </h3>
          </div>

          <img src="images/post-image.jpg" alt="java18" />
        </div>

        <div class="post_footer">
          <span class="material-icons">favorite_border</span>
          <span class="material-icons">comment</span>
          <span class="material-icons">send</span>
        </div>
        <p class="likes">17,876 likes</p>
        <div class="post_header-discription">
          <div class="post_header-text">
            <h3>
              Java
            </h3>
          </div>
          <p>Java 18 is now available! #Java18 #JDK18 #openjdk</p>
          <p class="comments">View all 2354 comments</p>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum
          </p>
        </div>
      </div>
    </div>
    <div class="post">
      <div class="post_profile-image">
        <img src="images/page-profile-image.jpg" alt="java-logo" />
      </div>
      <div class="post_body">
        <div class="post_header">
          <div class="post_header-text">
            <h3>
              Java
              <span class="header-icon-section">
                <span class="material-icons post_badge">verified</span>@java
              </span>
            </h3>
          </div>

          <img src="images/post-image.jpg" alt="java18" />
        </div>

        <div class="post_footer">
          <span class="material-icons">favorite_border</span>
          <span class="material-icons">comment</span>
          <span class="material-icons">send</span>
        </div>
        <p class="likes">17,876 likes</p>
        <div class="post_header-discription">
          <div class="post_header-text">
            <h3>
              Java
            </h3>
          </div>
          <p>Java 18 is now available! #Java18 #JDK18 #openjdk</p>
          <p class="comments">View all 2354 comments</p>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum
          </p>
        </div>
      </div>
    </div>
    <div class="post">
      <div class="post_profile-image">
        <img src="images/page-profile-image.jpg" alt="java-logo" />
      </div>
      <div class="post_body">
        <div class="post_header">
          <div class="post_header-text">
            <h3>
              Java
              <span class="header-icon-section">
                <span class="material-icons post_badge">verified</span>@java
              </span>
            </h3>
          </div>

          <img src="images/post-image.jpg" alt="java18" />
        </div>

        <div class="post_footer">
          <span class="material-icons">favorite_border</span>
          <span class="material-icons">comment</span>
          <span class="material-icons">send</span>
        </div>
        <p class="likes">17,876 likes</p>
        <div class="post_header-discription">
          <div class="post_header-text">
            <h3>
              Java
            </h3>
          </div>
          <p>Java 18 is now available! #Java18 #JDK18 #openjdk</p>
          <p class="comments">View all 2354 comments</p>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum
          </p>
        </div>
      </div>
    </div>
    <div class="post">
      <div class="post_profile-image">
        <img src="images/page-profile-image.jpg" alt="java-logo" />
      </div>
      <div class="post_body">
        <div class="post_header">
          <div class="post_header-text">
            <h3>
              Java
              <span class="header-icon-section">
                <span class="material-icons post_badge">verified</span>@java
              </span>
            </h3>
          </div>

          <img src="images/post-image.jpg" alt="java18" />
        </div>

        <div class="post_footer">
          <span class="material-icons">favorite_border</span>
          <span class="material-icons">comment</span>
          <span class="material-icons">send</span>
        </div>
        <p class="likes">17,876 likes</p>
        <div class="post_header-discription">
          <div class="post_header-text">
            <h3>
              Java
            </h3>
          </div>
          <p>Java 18 is now available! #Java18 #JDK18 #openjdk</p>
          <p class="comments">View all 2354 comments</p>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum
          </p>
        </div>
      </div>
    </div>
    <div class="post">
      <div class="post_profile-image">
        <img src="images/page-profile-image.jpg" alt="java-logo" />
      </div>
      <div class="post_body">
        <div class="post_header">
          <div class="post_header-text">
            <h3>
              Java
              <span class="header-icon-section">
                <span class="material-icons post_badge">verified</span>@java
              </span>
            </h3>
          </div>

          <img src="images/post-image.jpg" alt="java18" />
        </div>

        <div class="post_footer">
          <span class="material-icons">favorite_border</span>
          <span class="material-icons">comment</span>
          <span class="material-icons">send</span>
        </div>
        <p class="likes">17,876 likes</p>
        <div class="post_header-discription">
          <div class="post_header-text">
            <h3>
              Java
            </h3>
          </div>
          <p>Java 18 is now available! #Java18 #JDK18 #openjdk</p>
          <p class="comments">View all 2354 comments</p>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum
          </p>
        </div>
      </div>
    </div>

  </main>
  <!-- main section end -->

  <!-- aside element start -->
  <aside>
    <div class="tweet_box">
      <form>
        <div class="tweet_box-input">
          <img src="images/profilePic.jpeg" alt="profile imagw" />
          <input type="text" placeholder="search" class="search" />
          <!-- <button class="">Tweet</button> -->
        </div>
      </form>
    </div>
    <div class="aside_container">
      <h2>Suggestions</h2>
      <ul class="trends">
        <li class="trends_item">
          <div>
            <h1>#BREAKING NEWS</h1>
            <h5>195K Posts</h5>
          </div>
          <div>
            <span class="material-icons">more_horiz</span>
          </div>
        </li>
        <li class="trends_item">
          <div>
            <h1>#Tinubu</h1>
            <h5>3.7M Posts</h5>
          </div>
          <div>
            <span class="material-icons">more_horiz</span>
          </div>
        </li>
        <li class="trends_item">
          <div>
            <h1>#DollarToNaira</h1>
            <h5>15K Posts</h5>
          </div>
          <div>
            <span class="material-icons">more_horiz</span>
          </div>
        </li>
        <li class="trends_item">
          <div>
            <h1>#Apple</h1>
            <h5>1.4M Posts</h5>
          </div>
          <div>
            <span class="material-icons">more_horiz</span>
          </div>
        </li>
        <li class="trends_item">
          <div>
            <h1>#Sport</h1>
            <h5>895K Posts</h5>
          </div>
          <div>
            <span class="material-icons">more_horiz</span>
          </div>
        </li>
      </ul>
      <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    </div>
  </aside>
  <!-- aside element ends -->
</body>

</html>