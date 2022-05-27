<!--====== FOOTER 3 PART START ======-->

<footer class="footer-3-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="footer-logo text-center pb-45">
                    <a href="#"><img src="{{ asset(env('PUBLIC_URL') . 'website/assets/images/logo.png') }}"
                            alt=""></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="footer-item-1 mt-4">
                    <h4 class="title text-light">University of Tasmania</h4>
                    <p>
                        The University of Tasmania is very highly regarded for its commitment to excellence in learning
                        and teaching. Discipline areas for undergraduate and postgraduate coursework programs are across
                        five faculties and three specialist institutes: Faculties: College of Arts, Law and Education.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="footer-item-2 mt-4" style="text-align: center;">
                    <h4 class="title">Quick Links</h4>
                    <div class="links-list" style="display: block;">
                        <ul>
                            <li><a href="{{ route('home_page') }}">Home</a></li>
                            <li><a href="{{ route('services') }}">Rental Services</a></li>
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-8">
                <div class="footer-item-2 footer-item-3 mt-4">
                    <h4 class="title">About us</h4>
                    <p>Tasmania is an island of creative and curious minds. No matter where you join us from, you’ll
                        become part of a welcoming and collaborative community.</p>
                </div>
            </div>
        </div>
        <div class="row pb-85">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer-info mt-3">
                    <i class="fal fa-map-marker-alt"></i>
                    <h5 class="title">Address</h5>
                    <span>UTAS University of Austarlia</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer-info mt-3">
                    <i class="fal fa-envelope-open"></i>
                    <h5 class="title">Email Us</h5>
                    <span><a href="mailto:info@UTAS.com" style="color: #aeb7ca;"> info@UTAS.com</a></span>
                    <!--<span><a href="mailto:bilal@UTAS.com" style="color: #aeb7ca;"> bilal@UTAS.com </a></span>-->
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer-info mt-3">
                    <i class="fal fa-phone"></i>
                    <h5 class="title">Contact Us</h5>
                    <a href="tel:+923244448940"> <span> 34543233455</span></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer-info mt-3">
                    <i class="fal fa-clock"></i>
                    <h5 class="title">Opening Hour</h5>
                    <span>Mon - Friday , 9 am - 5 pm</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="footer-copy text-center">
                    <p>Copyright ©2021. All Rights Reserved By UTAS</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!--====== FOOTER 3 PART ENDS ======-->
