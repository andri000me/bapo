<?php

class Data_laporan_model extends MY_Model
{

    public function mahasiswa()
    {
        $data['fk'] = $this->db->query("SELECT count(*) as total FROM mst_mahasiswa WHERE kd_prodi LIKE '%FK%'")->row()->total;
        $data['fh'] = $this->db->query("SELECT count(*) as total FROM mst_mahasiswa WHERE kd_prodi LIKE '%FH%'")->row()->total;
        $data['fe'] = $this->db->query("SELECT count(*) as total FROM mst_mahasiswa WHERE kd_prodi LIKE '%FE%'")->row()->total;
        $data['fti'] = $this->db->query("SELECT count(*) as total FROM mst_mahasiswa WHERE kd_prodi LIKE '%FTI%'")->row()->total;
        $data['fpsi'] = $this->db->query("SELECT count(*) as total FROM mst_mahasiswa WHERE kd_prodi LIKE '%FPsi%'")->row()->total;
        $data['fkg'] = $this->db->query("SELECT count(*) as total FROM mst_mahasiswa WHERE kd_prodi LIKE '%FKG%'")->row()->total;

        return $data;
    }

    public function tata_usaha()
    {
        $data['fk'] = $this->db->query("SELECT count(*) as total FROM mst_tata_usaha WHERE kd_prodi LIKE '%FK%'")->row()->total;
        $data['fh'] = $this->db->query("SELECT count(*) as total FROM mst_tata_usaha WHERE kd_prodi LIKE '%FH%'")->row()->total;
        $data['fe'] = $this->db->query("SELECT count(*) as total FROM mst_tata_usaha WHERE kd_prodi LIKE '%FE%'")->row()->total;
        $data['fti'] = $this->db->query("SELECT count(*) as total FROM mst_tata_usaha WHERE kd_prodi LIKE '%FTI%'")->row()->total;
        $data['fpsi'] = $this->db->query("SELECT count(*) as total FROM mst_tata_usaha WHERE kd_prodi LIKE '%FPsi%'")->row()->total;
        $data['fkg'] = $this->db->query("SELECT count(*) as total FROM mst_tata_usaha WHERE kd_prodi LIKE '%FKG%'")->row()->total;

        return $data;
    }

    public function dosen()
    {
        $data['fk'] = $this->db->query("SELECT count(*) as total FROM mst_dosen WHERE kd_prodi LIKE '%FK%'")->row()->total;
        $data['fh'] = $this->db->query("SELECT count(*) as total FROM mst_dosen WHERE kd_prodi LIKE '%FH%'")->row()->total;
        $data['fe'] = $this->db->query("SELECT count(*) as total FROM mst_dosen WHERE kd_prodi LIKE '%FE%'")->row()->total;
        $data['fti'] = $this->db->query("SELECT count(*) as total FROM mst_dosen WHERE kd_prodi LIKE '%FTI%'")->row()->total;
        $data['fpsi'] = $this->db->query("SELECT count(*) as total FROM mst_dosen WHERE kd_prodi LIKE '%FPsi%'")->row()->total;
        $data['fkg'] = $this->db->query("SELECT count(*) as total FROM mst_dosen WHERE kd_prodi LIKE '%FKG%'")->row()->total;

        return $data;
    }

    public function ruang()
    {
        $data['fk'] = $this->db->query("SELECT count(*) as total FROM ruang WHERE kd_prodi LIKE '%FK%'")->row()->total;
        $data['fh'] = $this->db->query("SELECT count(*) as total FROM ruang WHERE kd_prodi LIKE '%FH%'")->row()->total;
        $data['fe'] = $this->db->query("SELECT count(*) as total FROM ruang WHERE kd_prodi LIKE '%FE%'")->row()->total;
        $data['fti'] = $this->db->query("SELECT count(*) as total FROM ruang WHERE kd_prodi LIKE '%FTI%'")->row()->total;
        $data['fpsi'] = $this->db->query("SELECT count(*) as total FROM ruang WHERE kd_prodi LIKE '%FPsi%'")->row()->total;
        $data['fkg'] = $this->db->query("SELECT count(*) as total FROM ruang WHERE kd_prodi LIKE '%FKG%'")->row()->total;

        return $data;
    }

    public function laboratorium()
    {
        $data['fk'] = $this->db->query("SELECT count(*) as total FROM laboratorium WHERE kd_prodi LIKE '%FK%'")->row()->total;
        $data['fh'] = $this->db->query("SELECT count(*) as total FROM laboratorium WHERE kd_prodi LIKE '%FH%'")->row()->total;
        $data['fe'] = $this->db->query("SELECT count(*) as total FROM laboratorium WHERE kd_prodi LIKE '%FE%'")->row()->total;
        $data['fti'] = $this->db->query("SELECT count(*) as total FROM laboratorium WHERE kd_prodi LIKE '%FTI%'")->row()->total;
        $data['fpsi'] = $this->db->query("SELECT count(*) as total FROM laboratorium WHERE kd_prodi LIKE '%FPsi%'")->row()->total;
        $data['fkg'] = $this->db->query("SELECT count(*) as total FROM laboratorium WHERE kd_prodi LIKE '%FKG%'")->row()->total;

        return $data;
    }

    public function mata_kuliah()
    {
        $data['fk'] = $this->db->query("SELECT count(*) as total FROM mata_kuliah WHERE kd_prodi LIKE '%FK%'")->row()->total;
        $data['fh'] = $this->db->query("SELECT count(*) as total FROM mata_kuliah WHERE kd_prodi LIKE '%FH%'")->row()->total;
        $data['fe'] = $this->db->query("SELECT count(*) as total FROM mata_kuliah WHERE kd_prodi LIKE '%FE%'")->row()->total;
        $data['fti'] = $this->db->query("SELECT count(*) as total FROM mata_kuliah WHERE kd_prodi LIKE '%FTI%'")->row()->total;
        $data['fpsi'] = $this->db->query("SELECT count(*) as total FROM mata_kuliah WHERE kd_prodi LIKE '%FPsi%'")->row()->total;
        $data['fkg'] = $this->db->query("SELECT count(*) as total FROM mata_kuliah WHERE kd_prodi LIKE '%FKG%'")->row()->total;

        return $data;
    }
}