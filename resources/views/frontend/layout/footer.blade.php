<footer class="footer-area">
    <div class="footer-widget">
        <div class="container">
            <div class="row footer-widget-wrapper pt-100 pb-70">
                <div class="col-md-6 col-lg-4">
                    <div class="footer-widget-box about-us">
                        <a href="#" class="footer-logo">
                            <img src="{{ asset('storage/' . $settings->footer_logo) }}"
                                alt="{{ $settings->company_name }}" title="{{ $settings->company_name }}" loading="lazy">
                        </a>
                        <p class="mb-3">
                            {{ $settings->footer_text }}
                        </p>
                        <ul class="footer-contact">
                            <li><a href="tel:{{ $settings->phone }}"><i
                                        class="far fa-phone"></i>{{ $settings->phone }}</a></li>
                            <li><i class="far fa-map-marker-alt"></i>{{ $settings->address }}</li>
                            <li><a href="mailto:{{ $settings->email }}"><i
                                        class="far fa-envelope"></i>{{ $settings->email }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="footer-widget-box list">
                        <h4 class="footer-widget-title">Quick Links</h4>
                        <ul class="footer-list">
                            <li><a href="{{ route('about') }}"><i class="fas fa-caret-right"></i> About Us</a></li>
                            <li><a href="{{ route('services') }}"><i class="fas fa-caret-right"></i> Services</a>
                            </li>
                            <li><a href="{{ route('contact') }}"><i class="fas fa-caret-right"></i> Contact</a></li>
                            <li><a href="{{ route('testimonials') }}"><i class="fas fa-caret-right"></i>
                                    Testimonials</a></li>
                            <li><a href="{{ route('calculator') }}"><i class="fas fa-caret-right"></i>
                                    EMI Calculator</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="footer-widget-box list">
                        <h4 class="footer-widget-title">Newsletter</h4>
                        <div class="footer-newsletter">
                            <p>Subscribe Our Newsletter To Get Latest Update And News</p>
                            <div class="subscribe-form">
                                <form action="#">
                                    <input type="email" class="form-control" placeholder="Your Email">
                                    <button class="theme-btn" type="submit">
                                        Subscribe Now <i class="far fa-paper-plane"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-6 align-self-center">
                    <p class="copyright-text">
                        &copy; Copyright <span id="date"></span> <a href="https://wahidhasib.com/" target="_blank">
                            Wahid Hasib
                        </a> All Rights
                        Reserved.
                    </p>
                </div>
                <div class="col-md-6 align-self-center">
                    <ul class="footer-social">
                        @if ($settings->facebook)
                            <li><a href="{{ $settings->facebook }}" target="_blank"><i
                                        class="fab fa-facebook-f"></i></a></li>
                        @endif
                        @if ($settings->instagram)
                            <li><a href="{{ $settings->instagram }}" target="_blank"><i
                                        class="fa-brands fa-instagram"></i></a></li>
                        @endif
                        @if ($settings->linkedin)
                            <li><a href="{{ $settings->linkedin }}" target="_blank"><i
                                        class="fab fa-linkedin-in"></i></a></li>
                        @endif
                        @if ($settings->youtube)
                            <li><a href="{{ $settings->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
