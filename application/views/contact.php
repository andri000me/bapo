<section id="contact-page" style="margin-top: 40px">
    <div class="container">
        <div class="center">
            <h2>Silahkan isi kritik dan saran</h2>
            <p> </p>
        </div>
        <div class="row contact-wrap">
            <div class="status alert alert-success" style="display: none"></div>
            <div class="col-md-6 col-md-offset-3">
                <div id="sendmessage">Your message has been sent. Thank you!</div>
                <div id="errormessage"></div>
                <form action="" method="post" role="form" class="contactForm">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Nama" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                        <div class="validation"></div>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" data-rule="email" data-msg="Please enter a valid email">
                        <div class="validation"></div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Judul" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject">
                        <div class="validation"></div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Pesan"></textarea>
                        <div class="validation"></div>
                    </div>
                    <div class="text-center"><button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Kirim Pesan</button></div>
                </form>
            </div>
        </div><!--/.row-->
    </div><!--/.container-->
</section>