<?php $this->load->view('_partials/navbar'); ?>

    <div id="breadcrumb">
        <div class="container">
            <?php $this->load->view('_partials/breadcrumb'); ?>
            <!--<div class="page-header"><h1>--><?php //echo $page_title; ?><!--</h1></div>-->
        </div>
    </div>

<?php $this->load->view($inner_view); ?>

<div style="margin-bottom: 60px"></div>

<?php $this->load->view('_partials/footer'); ?>