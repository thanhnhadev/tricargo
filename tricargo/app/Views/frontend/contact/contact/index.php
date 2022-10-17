<div class="page-content">
    <main class="main">
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="/"><i class="d-icon-home"></i></a></li>
                    <li>Liên hệ</li>
                </ul>
            </div>
        </nav>
        
        <div class="page-content mt30 ">
            <section class="contact-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-6 ls-m mb-4">
                            <div class="grey-section d-flex align-items-center h-100">
                                <div>
                                    <h4 class="mb-2 text-capitalize">Trụ sở chính</h4>
                                    <p>
                                        <?php echo $general['contact_address_detail'] ?>
                                    </p>
                                    <h4 class="mb-2 text-capitalize">Số điện thoại</h4>
                                    <p>
                                        <a href="tel:<?php echo $general['contact_hotline'] ?>"><?php echo $general['contact_hotline'] ?></a><br>
                                    </p>
                                    <h4 class="mb-2 text-capitalize">Email</h4>
                                    <p class="mb-4">
                                        <a href="mailto: <?php echo $general['contact_email'] ?>"><?php echo $general['contact_email'] ?></a><br>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-6 d-flex align-items-center mb-4">
                            <div class="w-100">
                                <form class="pl-lg-2 va-form-contact" method="post">
                                    <h2 class="ls-m font-weight-bold" style="font-size:20px">Liên hệ với chúng tôi</h2>
                                    <p>Chúng tôi sẽ liên hệ lại với bạn trong thời gian sớm nhất. Các trường hợp bắt buộc được đánh dấu *</p>
                                    <div class="row mb-2">
                                       
                                        <div class="col-md-6 mb-4">
                                            <input value="" name="name" class="form-name va-fullname-contact form-control" type="text" placeholder="Tên *" required>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <input value="" name="email" class="form-email va-email-contact form-control" type="email" placeholder="Email *" required>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <input value="" name="phone" class="form-phone form-control va-phone-contact"  placeholder="Số điện thoại *" required>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <input value="" name="title" class="form-title form-control va-title-contact"  placeholder="Tiêu đề *" required>
                                        </div>
                                         <div class="col-12 mb-4">
                                            <textarea name="detail" class="form-content form-control va-message-contact" required
                                            placeholder="Nội dung*"></textarea>
                                        </div>
                                    </div>
                                    <button class=" btn btn-dark btn-rounded">
                                        Gửi <i class="d-icon-arrow-right white"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Google Maps - Go to the bottom of the page to change settings and map location. -->
            <div class="contact-maps default">
                <?php echo $general['contact_map'] ?>
            </div>
            <div style="clear: both;"></div>
            <!-- End Map Section -->
        </div>
    </main>
</div>