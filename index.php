<?php
    require('./inc/header.php');
    require('./inc/head.php');
    require('./inc/functions.php');
?>

<h1>House Swaps, the best place to start your holiday</h1>
<div class="row">
  <div class="column">
    <div class="card">
      <h3>Italy</h3>
      <img src="assets/img/bedroom1.jpg" alt="bedroom-pic">
      <p>Roma, Italy</p>
      <p>Lovely and modern nest near the Colosseum</p>
    </div>
  </div>
</div>


<section class="bg-light">
    <div class="container">
        <div class="row">  
        </div>
        <div class="row justify-content-center">
            <?= displayhouses(); ?>
        </div>
    </div>
</section>

 <!-- Images used to open the lightbox -->
 <div class="row">
  <div class="column">
    <img src="assets/img/bedroom1.jpg" onclick="openModal();currentSlide(1)" class="hover-shadow">
  </div>
  <div class="column">
    <img src="assets/img/bedroom1.jpg" onclick="openModal();currentSlide(2)" class="hover-shadow">
  </div>
  <div class="column">
    <img src="assets/img/bedroom1.jpg" onclick="openModal();currentSlide(3)" class="hover-shadow">
  </div>
  <div class="column">
    <img src="assets/img/bedroom1.jpg" onclick="openModal();currentSlide(4)" class="hover-shadow">
  </div>
</div>

<!-- The Modal/Lightbox -->
<div id="myModal" class="modal">
  <span class="close cursor" onclick="closeModal()">&times;</span>
  <div class="modal-content">

    <div class="mySlides">
      <div class="numbertext">1 / 4</div>
      <img src="assets/img/bedroom1.jpg" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">2 / 4</div>
      <img src="assets/img/bedroom1.jpg" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">3 / 4</div>
      <img src="assets/img/bedroom1.jpg" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">4 / 4</div>
      <img src="assets/img/bedroom1.jpg" style="width:100%">
    </div>

    <!-- Next/previous controls -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>

    <!-- Caption text -->
    <div class="caption-container">
      <p id="caption"></p>
    </div>

    <!-- Thumbnail image controls -->
    <div class="column">
      <img class="demo" src="assets/img/bedroom1.jpg" onclick="currentSlide(1)" alt="bedroom-pic">
    </div>

    <div class="column">
      <img class="demo" src="assets/img/bedroom1.jpg" onclick="currentSlide(2)" alt="bedroom-pic">
    </div>

    <div class="column">
      <img class="demo" src="assets/img/bedroom1.jpg" onclick="currentSlide(3)" alt="bedroom-pic">
    </div>

    <div class="column">
      <img class="demo" src="assets/img/bedroom1.jpg" onclick="currentSlide(4)" alt="bedroom-pic">
    </div>
  </div>
</div>

<?php
     require('inc/footer.php');
?>