<div class="container" style="color:black;">
    <div class="panel panel-default">

        <div align="right">
            <a href="admin_data_tata_usaha_universitas_tambah.php">
                <img src="images/add_green.png" width="80px" height="90px" style="margin-right:120px; margin-top:10px;">
            </a>
        </div>

        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="dataTables_length" id="dataTables-example_length"><label>Lihat dalam <select name="dataTables-example_length" aria-controls="dataTables-example" class="form-control input-sm">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select> data</label></div>
                        </div>
                        <div class="col-sm-6">
                            <div id="dataTables-example_filter" class="dataTables_filter"><label>Cari: <input type="search" class="form-control input-sm" placeholder="" aria-controls="dataTables-example"></label></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info">
                                <thead>
                                <tr role="row">
                                    <th style="cursor: pointer; width: 109px;" class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="No : activate to sort column descending">
                                        <center>No <img src="data-grid/datatables/media/images/sort_both.png"></center>
                                    </th>
                                    <th style="cursor: pointer; width: 188px;" class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="NIK : activate to sort column ascending">
                                        <center>NIK <img src="data-grid/datatables/media/images/sort_both.png"></center>
                                    </th>
                                    <th style="cursor: pointer; width: 211px;" class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Nama : activate to sort column ascending">
                                        <center>Nama <img src="data-grid/datatables/media/images/sort_both.png"></center>
                                    </th>
                                    <th style="cursor: pointer; width: 311px;" class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Nama Pengguna : activate to sort column ascending">
                                        <center>Nama Pengguna <img src="data-grid/datatables/media/images/sort_both.png"></center>
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Opsi: activate to sort column ascending" style="width: 198px;">Opsi</th>
                                </tr>
                                </thead>
                                <tbody>


                                <tr role="row" class="odd">
                                    <td class="sorting_1">
                                        <center>1</center>
                                    </td>
                                    <td>
                                        <center>0023022017</center>
                                    </td>
                                    <td>
                                        <center>TU Universitas</center>
                                    </td>
                                    <td>
                                        <center>
                                            tu_univ
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <a href="admin_data_tata_usaha_universitas_ubah.php?ubah=0023022017">
                                                <img src="images/edit_green.png" style="margin-left:10px;" width="30" height="30">
                                            </a>

                                            <a href="admin_data_tata_usaha_universitas_kueri_delete.php?hapus=0023022017" onclick="return doconfirm()">
                                                <img src="images/delete_green.png" style="margin-left:10px;" width="30" height="30">
                                            </a>
                                        </center>
                                    </td>

                                    <script>
                                        function doconfirm() {
                                            job = confirm("Anda yakin akan menghapus data?");
                                            if (job !== true) {
                                                return false;
                                            }
                                        }
                                    </script>

                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="dataTables_info" id="dataTables-example_info" role="status" aria-live="polite">Menampilkan 1 ke 1 dalam 1 data</div>
                        </div>
                        <div class="col-sm-6">
                            <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                                <ul class="pagination">
                                    <li class="paginate_button previous disabled" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_previous"><a href="#">Sebelumnya</a></li>
                                    <li class="paginate_button active" aria-controls="dataTables-example" tabindex="0"><a href="#">1</a></li>
                                    <li class="paginate_button next disabled" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_next"><a href="#">Selanjutnya</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>