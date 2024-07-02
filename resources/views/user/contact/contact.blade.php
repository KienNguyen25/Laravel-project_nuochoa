@extends('user.layouts.master')
@section('content')
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div
                    class="banner_content d-md-flex justify-content-between align-items-center"
                >
                    <div class="mb-3 mb-md-0">
                        <h2>Liên hệ</h2>
                        <p>Hãy liên hệ với chúng tôi nếu bạn cần</p>
                    </div>
                    <div class="page_link">
                        <a href="">Trang chủ</a>
                        <a href="">Liên hệ</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!-- ================ contact section start ================= -->
    <section class="section_gap">
        <div class="container">
            <div class="d-none d-sm-block mb-5 pb-4">
                <div id="map" style="height: 480px;">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.7726485483067!2d105.93690441538499!3d21.001748694074756!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135a8ccf336b8ef%3A0xa1359fb5644a9bb5!2zMTczIMSQLiBUcsOidSBRdeG7sywgVHLDonUgUXXhu7MsIEdpYSBMw6JtLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1680014240962!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>


            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">Liên lạc</h2>
                </div>
                <div class="col-lg-4">
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-home"></i></span>
                        <div class="media-body">
                            <h3>Học Viện Nông Nghiệp Việt Nam.</h3>
                            <p>Trâu Quỳ, Gia Lâm, Hà Nội</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                        <div class="media-body">
                            <h3><a href="tel:454545654">0376625142</a></h3>
                            <p>t2 tới t6, 8h - 21h</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-email"></i></span>
                        <div class="media-body">
                            <h3><a href="mailto:support@colorlib.com">support@cgmail.com</a></h3>
                            <p>Hãy gửi câu hỏi tới chúng tôi!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
