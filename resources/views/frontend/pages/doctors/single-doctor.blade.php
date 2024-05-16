@extends('layouts.frontend')
@section('title', $title)
@section('content')
<div class="doctor-details-area section">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="doctor-details-item doctor-details-left">
                    <img src="img/doctor-details.jpg" alt="#">
                    <div class="doctor-details-contact">
                        <h3>Contact info</h3>
                        <ul class="basic-info">
                            <li>
                                <i class="icofont-ui-call"></i>
                                Call : +07 554 332 322
                            </li>
                            <li>
                                <i class="icofont-ui-message"></i>
                                hello@medsev.com
                            </li>
                            <li>
                                <i class="icofont-location-pin"></i>
                                4th Floor, 408 No Chamber
                            </li>
                        </ul>
                        <!-- Social -->
                        <ul class="social">
                            <li><a href="#"><i class="icofont-facebook"></i></a></li>
                            <li><a href="#"><i class="icofont-google-plus"></i></a></li>
                            <li><a href="#"><i class="icofont-twitter"></i></a></li>
                            <li><a href="#"><i class="icofont-vimeo"></i></a></li>
                            <li><a href="#"><i class="icofont-pinterest"></i></a></li>
                        </ul>
                        <!-- End Social -->
                        <div class="doctor-details-work">
                            <h3>Working hours</h3>
                            <ul class="time-sidual">
                                <li class="day">Monday - Fridayp <span>8.00-20.00</span></li>
                                <li class="day">Saturday <span>9.00-18.30</span></li>
                                <li class="day">Monday - Thusday <span>9.00-15.00</span></li>
                                <li class="day">Monday - Fridayp <span>8.00-20.00</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="doctor-details-item">
                    <div class="doctor-details-right">
                        <div class="doctor-name">
                            <h3 class="name">Dr. Sarah Taylor</h3>
                            <p class="deg">Neurosurgeon.</p>
                            <p class="degree">MBBS in Neurology, PHD in Neurosurgeon.</p>
                        </div>
                        <div class="doctor-details-biography">
                            <h3>Biography</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p><br>
                            <p>Risus commodo viverra maecenas accumsan lacus vel facilisis.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                        </div>
                        <div class="doctor-details-biography">
                            <h3>Education</h3>
                            <ul>
                                <li>PHD degree in Neorology at University of Mediserv (2006)</li>
                                <li>Master of Neoro Surgery  at University of Mediserv (2002)</li>
                                <li>MBBS degree in Neurosciences at University of Mediserv (2002)</li>
                                <li>Higher Secondary Certificate at Mediserv collage  (1991)</li>
                            </ul>
                        </div>
                        <div class="doctor-details-biography">
                            <h3>Biography</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra</p>
                            <br>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra</p>
                            <br>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra eiusmod tempor incididunt ut labore et dolore magna.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
