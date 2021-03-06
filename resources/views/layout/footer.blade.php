<footer class="footer-container">
    <div class="footer-newsletter">
        <div class="container">
            <div class="news-container">
                <div class="container">
                    <form action="{{ route('newsletter.subscribe') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="subscribe-text">
                            <i class="icon-newsletter-1"></i>
                            <h3>Want more promotions?</h3>
                            <label for="newsletter">Sign up for our newsletter</label>
                        </div>
                        <div class="subscribe-input">
                            <div class="input-box">
                                <input type="text" name="email" id="newsletteremail" title="digite seu e-mail" class="input-text required-entry validate-email">
                                <button type="submit" class="btn primary" id="newsletter-button"><span>Send</span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-primary-container">
        <div class="container">
            <div class="footer-desc">
                <div class="desc-container">
                    <img src="{{asset('/storage/images/footer/logo-footer.png')}}" alt="">
                    <p>@lang("More than 60 Years after its foundation, Odebrecht is a solid company, currently among the 10 largest roasted and ground coffee companies in Brazil and the first in Brazilian southern region, exporting its products to more than 20 countries.") <span style="color: #ffffff;"><strong><a href="/quem-somos">@lang("Read more")</a></strong></span></p>
                </div>
            </div>
            <div class="footer-lists">
                <div class="footer-list-wrapper">
                    <h4>@lang("About Us")</h4>
                    <ul class="footer-link-list">
                        <li><a href="{{ route('about-us') }}">@lang("About Us")</a></li>
                        <li><a href="{{ route('history') }}">@lang("History of Coffee")</a></li>
                    </ul>
                </div>
                <div class="footer-list-wrapper">
                    <h4>@lang("Service")</h4>
                    <ul class="footer-link-list">
                    <li><a href="{{ route('terms-of-service') }}">@lang("Terms of Service")</a></li>
                    </ul>
                </div>
                <div class="footer-list-wrapper">
                    <h4>@lang("Website Policies")</h4>
                    <ul class="footer-link-list">
                        <li><a href="{{ route('privacy-policy') }}">@lang("Privacy Policy")</a></li>
                        <li><a href="{{ route('delivery-policy') }}">@lang("Delivery Policy")</a></li>
                        <li><a href="{{ route('return-policy') }}">@lang("Return Policy")</a></li>
                    </ul>
                </div>
            </div>
            <div class="social-links-container">
                <div class="page-link">
                        <a href="{{ route('home') }}">@lang("Café Odebrecht")</a>
                </div>
                <ul class="social-media-links footer-link-list">
                    <li>
                        <a href="#" target="_blank" rel="nofollow">
                            <i class="icon-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" target="_blank" rel="nofollow">
                            <i class="icon-whatsapp"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" target="_blank" rel="nofollow">
                            <i class="icon-instagram"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="contact-us">
            <div class="contact-us-container">
                <ul class="footer-link-list">
                    <li>
                        <i class="icon-telefone-1"></i>
                        <span>@lang("Customer Service")<br>
                        <a>(43) 3377-4141</a>
                        <a class="maillink" href="mailto:sac@cafeodebrecht.com.br">sac@cafeodebrecht.com.br</a>
                        </span>
                    </li>
                    <li>
                        <a href="#"><i class="icon-chats"></i></a>
                        <a href="#"><span class="pt10 pl8">@lang("Online<br>Chat")</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
