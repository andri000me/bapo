<!--<div class="footer">-->
<!--	<div class="container">-->
<!--		--><?php //if (ENVIRONMENT=='development'): ?>
<!--			<p class="pull-right text-muted">-->
<!--				CI Bootstrap Version: <strong>--><?php //echo CI_BOOTSTRAP_VERSION; ?><!--</strong>, -->
<!--				CI Version: <strong>--><?php //echo CI_VERSION; ?><!--</strong>, -->
<!--				Elapsed Time: <strong>{elapsed_time}</strong> seconds, -->
<!--				Memory Usage: <strong>{memory_usage}</strong>-->
<!--			</p>-->
<!--		--><?php //endif; ?>
<!--		<p class="text-muted">&copy; <strong>--><?php //echo date('Y'); ?><!--</strong> All rights reserved.</p>-->
<!--	</div>-->
<!--</div>-->

<footer>
    <div class="footer">
        <div class="container">
            <div class="social-icon">
                <div class="col-md-6">
                    <ul class="social-network">
                        <li><a target="_blank" href="https://www.facebook.com/pages/Fakultas-Teknologi-Informasi-Universitas-YARSI/489185404510832" class="fb tool-tip" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <!--<li><a href="#" class="twitter tool-tip" title="Twitter"><i class="fa fa-twitter"></i></a></li>-->
                        <!--<li><a href="#" class="gplus tool-tip" title="Google Plus"><i class="fa fa-google-plus"></i></a></li>-->
                        <!--<li><a href="#" class="linkedin tool-tip" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>-->
                        <!--<li><a href="#" class="ytube tool-tip" title="You Tube"><i class="fa fa-youtube-play"></i></a></li>-->
                    </ul>
                </div>
            </div>

            <div class="col-md-6 pull-right">
                <div class="copyright">
                    <!--Copyright © --><? //= date('Y'); ?>
                    <div class="credits">
                        Copyright © <?= date('Y'); ?>
                        <a href="http://fti.yarsi.ac.id/">Fakultas Teknologi Informasi</a> - <a href="http://yarsi.ac.id/">Universitas YARSI</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="pull-right">
            <a href="#" class="scrollup"><i class="fa fa-angle-up fa-3x"></i></a>
        </div>
    </div>
</footer>