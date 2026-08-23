<?php include 'header.php'; ?>

<!-- Carousel Section -->
<div id="chessCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#chessCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#chessCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#chessCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="images/pawn.avif" class="d-block w-100" alt="Chess board">
            <div class="carousel-caption">
                <h1>Master the Game of Kings</h1>
                <p>Join the best chess academy with expert coaches and a path to mastery.</p>
                <a href="register.php" class="btn btn-primary btn-lg">Start Your Journey <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="images/carlsen.webp" class="d-block w-100" alt="Chess pieces">
            <div class="carousel-caption">
                <h1>Learn from Grandmasters</h1>
                <p>Personalized coaching from FIDE-rated players and experienced instructors.</p>
                <a href="about.php" class="btn btn-outline-light btn-lg">Meet Our Coaches</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="images/two_knights.avif" class="d-block w-100" alt="Chess tournament">
            <div class="carousel-caption">
                <h1>Compete & Excel</h1>
                <p>Participate in tournaments and climb the ratings.</p>
                <a href="courses.php" class="btn btn-outline-light btn-lg">Explore Courses</a>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#chessCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#chessCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!-- Feature Cards (unchanged) -->
<div class="row text-center mb-5">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <i class="fas fa-chalkboard-user fa-3x mb-3" style="color: #ffc107;"></i>
                <h5 class="card-title">Expert Coaches</h5>
                <p class="card-text">Learn from FIDE-rated players and experienced instructors.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <i class="fas fa-clock fa-3x mb-3" style="color: #ffc107;"></i>
                <h5 class="card-title">Flexible Timing</h5>
                <p class="card-text">Classes available on weekends and weekdays as per your schedule.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <i class="fas fa-trophy fa-3x mb-3" style="color: #ffc107;"></i>
                <h5 class="card-title">Tournaments</h5>
                <p class="card-text">Participate in internal and external chess tournaments.</p>
            </div>
        </div>
    </div>
</div>

<div class="row align-items-center mt-5">
    <div class="col-md-6">
        <img src="images/why_choose_us.jpg" class="img-fluid rounded shadow" alt="Chess pieces">
    </div>
    <div class="col-md-6">
        <h2>Why Choose Us?</h2>
        <p>Our structured curriculum, personalized coaching, and supportive community ensure rapid improvement. Whether you're a beginner or aiming for titles, we have a program for you.</p>
        <a href="about.php" class="btn btn-outline-primary">Learn More</a>
    </div>
</div>

<?php include 'footer.php'; ?>