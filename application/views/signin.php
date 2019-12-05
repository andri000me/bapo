<section id="contact-page" style="margin-top: 40px">
    <div class="container">
        <div class="center">
            <h2>Masuk e-SAP</h2>
            <p>Silahkan input data untuk masuk sistem e-SAP. Jika Anda belum terdaftar, hubungi Tata Usaha di Fakultas Anda.</p>
        </div>
        <div class="row contact-wrap">
            <div class="col-md-6 col-md-offset-3">
                <div id="sendmessage">Your message has been sent. Thank you!</div>
                <div id="errormessage"></div>
                <form action="config/authentication.php" method="post" role="form" class="contactForm">
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Nama Pengguna" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required="">
                        <div class="validation"></div>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Kata Sandi" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required="">
                        <div class="validation"></div>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="re_password" id="re_password" placeholder="Ulangi Kata Sandi" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" onblur="checkRePassword()" required="">
                        <span id="user-re-password"></span>
                        <p><img src="images/LoaderIcon.gif" id="loaderIcon2" style="display:none" width="100" height="70"></p>
                        <div class="validation"></div>
                    </div>
                    <div class="text-center"><button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Masuk</button></div>
                </form>
            </div>
        </div><!--/.row-->
    </div><!--/.container-->
</section>