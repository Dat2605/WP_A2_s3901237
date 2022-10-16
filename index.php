<?php
require 'tools.php';
$page_title = "Homepage";
require_once 'header.php';
?>
            <nav>
                <ul>
                    <li><a href="#about_link"><strong>About Us</strong></a></li>
                    <li><a href="#staff_link"><strong>Who We Are</strong></a></li>
                    <li><a href="#service_area_link"><strong>Service Area</strong></a></li>
                    <li><a href="administration.php"><strong>Administration Page</strong></a></li>
                    <li><button onclick="location.href='booking.php'" class="booking_button"><span>Booking </span></button></li>
                </ul>
            </nav>
            
            <main>
                <figure class="about_grid" id="about_link">
                    <div class="about_text">
                        <h2 id="about_us">About Us</h2>
                            <p>Russel Street Medical opened in 2020 and is located in Melbourne's CBD at 340 Russel Street 
                            Melbourne, just opposite The Old Melbourne Jail and within walking distance of Melbourne Central 
                            Train Station.</p>
                            <p>We strive to help all of our patients with a focus on preventative health care, a view to managing 
                            chronic health conditions with a holistic approach, and with access to a wide range of specialist care 
                            providers when needed.</p>  
                            <p>Under partnerships, we are able to offer RMIT students & staff discounted rates.</p>
                    </div>
                </figure>   
                
                <div class="container">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="staff_team.jpg" alt="Staff Team" style="width:100%;">
      </div>

      <div class="item">
        <img src="bloodtest.jpg" alt="Bloodtest Facility" style="width:100%;">
      </div>
    
      <div class="item">
        <img src="room.jpg" alt="Dental Facility" style="width:100%;">
      </div>

      <div class="item">
        <img src="room2.jpg" alt="Clinic Rooms" style="width:100%;">
      </div>

      <div class="item">
        <img src="scan.jpg" alt="Radiology Facility" style="width:100%;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
                </div>
                </article>
                <article>
                    <h2 id="pricing_hours">Pricing & Hours</h2>
                    <div class="fees-grid">
                        <section class="standard_price">
                            <h3>Standard Consultation</h3>
                            <p>Normal Fee: <span>$85.00</span></p>
                            <p>RMIT Member Fee: <span>$60.50</span></p>
                            <p>Medicare Rebate Fee: <span>$39.75</span></p>
                        </section>

                        <section class="long_price">
                            <h3>Long or Complex Consultation</h3>
                            <p>Normal Fee: <span>$130.00</span></p>
                            <p>RMIT Member Fee: <span>$91.00</span></p>
                            <p>Medicare Rebate Fee: <span>$76.95</span></p>
                        </section>
                    </div>
                </article>

                <aside class="hours">
                    <table class="hours_table">
                        <tr>
                        <th colspan="2">Opening Hours</th></tr>
                        <tr>
                            <td>Monday</td>
                            <td>9am - 6pm</td>
                        </tr>
                        <tr>
                            <td>Tuesday</td>
                            <td>9am - 6pm</td>
                        </tr>
                        <tr>
                            <td>Wednesday</td>
                            <td>9am - 6pm</td>
                        </tr>
                        <tr>
                            <td>Thursday</td>
                            <td>9am - 6pm</td>
                        </tr>
                        <tr>
                            <td>Friday</td>
                            <td>9am - 6pm</td>
                        </tr>
                        <tr>
                            <td>Saturday</td>
                            <td>9am - 6pm</td>
                        </tr>
                        <tr>
                            <td>Sunday</td>
                            <td>9am - 6pm</td>
                        </tr>
                    </table>
                </aside>

                <section id="staff_link">
                    <h2 id="staff">Staff</h2>
                    <div class="team">
                        <div class="staff_profiles">
                            <div class="profile_pic">
                                <img class="profile_img" src="Abigale.jpg" alt="Picture of Dr.Abigale">
                            </div>
                            <h3>Dr. Abigale Laurentis</h3>
                            <p>Abigale Laurentis completed her medical degree at the University of Queensland in 2013, where she 
                                also obtained a Bachelor of Science in Biomedicine.</p>
                            <p>Over her training and practice, Abigale has worked in a variety of clinical settings including 
                                specialities at Latrobe Health.</p>
                        </div>
                        <div class="staff_profiles">
                            <div class="profile_pic">
                                <img class="profile_img" src="Stephen.jpg" alt="Picture of Dr.Abigale">
                            </div>
                            <h3>Dr. Stephen Hill</h3>
                            <p>Stephen Hill graduated from Auckland University in New Zealand in 2014, and obtained his 
                                Fellowship from the Royal Australian College of General Practitioners in 2017.</p>
                            <p>Over his training and practice, Stephen worked in internal medicine at the Royal Children's Hospital 
                                Melbourne before transitioning to General Practice.</p>
                        </div>
                        <div class="staff_profiles">
                            <div class="profile_pic">
                                <img class="profile_img" src="Kiyoko.jpg" alt="Picture of Dr.Abigale">
                            </div>
                            <h3>Ms Kiyoko Tsu</h3>
                            <p>Abigale Laurentis completed her medical degree at the University of Queensland in 2013, where she 
                                also obtained a Bachelor of Science in Biomedicine.</p>
                            <p>Over her training and practice, Abigale has worked in a variety of clinical settings including 
                                specialities at Latrobe Health.</p>
                        </div>
                    </div>
                </section>

                <article class="service_container" id="service_area_link">
                    <h2 id="service_area">Service Area</h2>
                        <p><strong>Notice:</strong> New patients need to register with us in person at the provided address of the clinic.</p>
                        <p>Patients with existing accounts can book an appointment for vaccinations and blood tests through our <a href="booking.php">online booking system</a></p>
                      
                </article>
                <?php require_once 'footer.php';?>
            </main>
            








