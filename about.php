<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>iDiscuss Forum - About</title>
    <?php require 'partials/_bootstrap.php'; ?>
    <?php require 'partials/_dbconnect.php'; ?>
  </head>
  <body>
    <section class="main-section">
      <!-- Header -->
      <?php require 'partials/_header.php'; ?>
      <div class="container my-5">
        <h1 class="text-center display-3">About Us</h1>
        <p class="lead text-center mb-5">Building a vibrant community where developers and tech enthusiasts learn, collaborate, and innovate together every day.</p>
        <hr class="user-divider">
        <div class="row align-items-center d-flex gap-5 my-5">
          <div class="col-md-5">
            <img
              src="./partials/tech-forum-wwa.png"
              alt="Tech Forum Community"
              class="img-fluid rounded-3 shadow"
            />
          </div>
          <div class="col-md-6">
            <h2 class="display-6 fw-bold">Who We Are</h2>
            <p class="lead mt-3">
              Welcome to Tech Forum, your community hub where technology
              enthusiasts, developers, and lifelong learners connect,
              collaborate, and grow together.
            </p>
            <p>
              Founded with a vision to build a safe, inclusive, and vibrant tech
              space, Tech Forum brings together individuals passionate about
              technology, coding, and innovation. We are a collective of
              thinkers, tinkerers, and creators who believe in sharing knowledge
              to empower each other.
            </p>
            <p>
              From discussing the latest frameworks and debugging PHP scripts to
              exploring AI and cloud technologies, our forum is a space where
              ideas are shared openly, and curiosity is celebrated. We encourage
              meaningful conversations, practical problem-solving, and
              peer-to-peer mentorship to foster growth for developers of all
              experience levels.
            </p>
            <p>
              At Tech Forum, every question is valued, and every answer helps
              shape a culture of continuous learning and improvement. Whether
              you are a student starting your programming journey or a
              professional looking to refine your skills, we are here to support
              you.
            </p>
          </div>
        </div>

        <div class="row align-items-center d-flex gap-5 my-5">
          <div class="col-md-5 order-md-2">
            <img
              src="./partials/tech-forum-mission.png"
              alt="Tech Forum Mission"
              class="img-fluid rounded-3 shadow"
            />
          </div>
          <div class="col-md-6 order-md-1">
            <h2 class="display-6 fw-bold">Our Mission</h2>
            <p class="lead mt-3">
              Our mission is to create an environment where technology is
              demystified and learning is accessible, engaging, and enjoyable
              for everyone.
            </p>
            <p>
              We believe that knowledge shared is knowledge multiplied. By
              creating a platform where developers can openly discuss challenges
              and solutions, we are building a culture of support and shared
              growth. Our commitment extends beyond technical discussions; we
              also encourage conversations about career development, soft
              skills, and industry trends to help you become a well-rounded
              professional.
            </p>
            <p>
              Through organized threads, collaborative discussions, and regular
              community challenges, Tech Forum aims to keep you engaged while
              fostering a growth mindset. We are passionate about creating a
              space where your learning journey is recognized and celebrated,
              and where your contributions make a tangible difference to others.
            </p>
            <p>
              Together, we aspire to cultivate a thriving ecosystem where
              innovation meets community, and where every member feels empowered
              to pursue their goals in the world of technology.
            </p>
          </div>
        </div>

        <div class="row align-items-center d-flex gap-5 my-5">
          <div class="col-md-5">
            <img
              src="./partials/tech-forum-join.png"
              alt="Join Tech Forum"
              class="img-fluid rounded-3 shadow"
            />
          </div>
          <div class="col-md-6">
            <h2 class="display-6 fw-bold">Join Our Community</h2>
            <p class="lead mt-3">
              We invite you to become a part of Tech Forum and contribute to a
              growing network of curious minds.
            </p>
            <p>
              By joining our community, you gain access to a platform that
              values open dialogue and quality interactions. You can participate
              in discussions, showcase your projects, seek guidance from
              experienced developers, and give back by helping others on their
              coding journeys.
            </p>
            <p>
              Whether you want to master a specific technology, stay updated
              with industry advancements, or find like-minded individuals who
              share your passion, Tech Forum is here for you. Let’s build,
              learn, and grow together.
            </p>
            <p>
              Together, we can transform challenges into opportunities and
              create a positive impact in the tech world, one conversation at a
              time.
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- Footer -->
    <?php require 'partials/_footer.php'; ?>
  </body>
</html>
