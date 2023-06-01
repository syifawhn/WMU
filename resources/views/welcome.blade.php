<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Waskita media utama</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
  </head>
  <body>
    <nav class="wrapper">
      <div class="brand">
        <div class="logo-1"><img src="logo.png" /></div>
      </div>

      <ul class="navigation">
        <li><a href="">Home</a></li>
        <li><a href="http://127.0.0.1:5500/properti.html">properti</a></li>
        <li><a href="" class="active">kontak</a></li>
        <li><a href="http://127.0.0.1:5500/team.html">Team</a></li>
      </ul>
    </nav>
    <div class="container">
      <div class="content">
        <h1 style="bold">INTEGRATED EVENT MANAGEMENT</h1>
        <p class="long paragraph">
          Provide a variety of good services and in-house solutions and
          associates. Provide a variety of good services and in-house solutions
          and associates. Provide a variety of good services and in-house
          solutions and associates. Provide a variety of good services and
          in-house solutions and associates.
        </p>
        <div class="btn-1">
          <button id="btn1">About Us</button>
          <button id="btn2">Plan Your Event With Us</button>
        </div>
      </div>
      <div class="video">
        <video src="profile.mp4" controls></video>
      </div>
    </div>
    <div class="container2">
      <div class="content2">
        <div class="h2-1">
          <h1 style="bold">WASKITA</h1>
          &nbsp;
          <h1 style="bold">MEDIA</h1>
          &nbsp;
          <h1 style="bold">UTAMA</h1>
        </div>
        <div class="p1">
          <p class="long-paragraph1">
            An Event Management PT. Waskita Media Utama was formed in November
            2016 in Palembang, with the goal of managing memorable events and
            help clients to effectively promote their goals. With collective
            working experience in the events, media, and advertising industries,
            event equipment, we set to design and organise events for our
            clients that help them achieve their excellent targets.
          </p>
        </div>
      </div>
    </div>
    <div class="content3">
      <div class="container">
        <div class="container3">
          <img src="content3.png" class="image" />
          <div class="text">
            <h2>Some of the events we manage are</h2>
            <ul>
              <li>
                <p>
                  Product Launchesideas and conceptualisation, design, artwork,
                  staging and decor, talents, logistic coordination and event
                  production
                </p>
              </li>
              &nbsp;
              <li>
                <p>Trade shows, Exhibitions, Conferences & Conventions</p>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="content4">
      <div class="container3">
        <img src="content3.png" class="image2" />
        <div class="text">
          <h2>Some of the events we manage are</h2>
          <ul>
            &nbsp;
            <li class="li2-4">
              <p class="p2-4">
                Trade shows, Exhibitions, Conferences & Conventions
              </p>
            </li>
            <li>
              <a> rade shows, Exhibitions, Conferences & Conventions</a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="contact">
      <div class="contact-item">
        <h1><a> Contact Us</a></h1>
        <span class="no1">+6289501488103 Raka</span>
      </div>
      <div class="contact-item">
        <h1><a> Contact Us</a></h1>
        <span class="no1">+6289501488103 Ria</span>
    </div>
      <!-- tombol scroll -->
    <div>
      <button class="scroll-to-top" onclick="scrollToTop()">&#8593;</button>
        <script>
    var scrollToTopBtn = document.querySelector(".scroll-to-top");

    window.addEventListener("scroll", function () {
      if (window.pageYOffset > 100) {
        scrollToTopBtn.classList.add("show");
      } else {
        scrollToTopBtn.classList.remove("show");
      }
    });

    function scrollToTop() {
      window.scrollTo({
        top: 0,
        behavior: "smooth"
      });
    }
  </script>
    </div>
    <script src="script.js"></script>
  </body>
</html>
