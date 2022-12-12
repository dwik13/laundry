<?php
defined('BASEPATH') or exit('No direct script access allowed');


class M_dashboard extends CI_Model
{
    //cek_laundry
    public function cek_status($kode_transaksi)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('konsumen', 'transaksi.kode_konsumen = konsumen.kode_konsumen', 'left');
        $this->db->join('paket', 'transaksi.kode_paket = paket.kode_paket', 'left');
        $this->db->where('transaksi.kode_transaksi', $kode_transaksi);
        return $this->db->get()->result();
    }

    // dashboard
    public function transaksi_baru()
    {
        $this->db->where('status', 'Baru');
        return $this->db->get('transaksi')->num_rows();
    }

    public function grandtotrans()
    {
        $query = "SELECT sum(grand_total) as grandtotal FROM transaksi";
        return $this->db->query($query)->row_array();
    }

    // konsumen
    public function generate_kode_konsumen()
    {
        $this->db->select('RIGHT(konsumen.kode_konsumen, 3) as kode', false);
        $this->db->order_by('kode_konsumen', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('konsumen');
        if ($query->num_rows() > 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }

        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "K" . $kodemax;
        return $kodejadi;
    }

    // paket
    public function generate_kode_paket()
    {
        $this->db->select('RIGHT(paket.kode_paket, 3) as kode', false);
        $this->db->order_by('kode_paket', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('paket');
        if ($query->num_rows() > 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }

        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "P" . $kodemax;
        return $kodejadi;
    }

    // transaksi
    public function generate_kode_transaksi()
    {
        $this->db->select('RIGHT(transaksi.kode_transaksi, 3) as kode', false);
        $this->db->order_by('kode_transaksi', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('transaksi');
        if ($query->num_rows() > 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }

        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "" . $kodemax;
        return $kodejadi;
    }


    public function getTransaksi()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('konsumen', 'transaksi.kode_konsumen = konsumen.kode_konsumen', 'left');
        $this->db->join('paket', 'transaksi.kode_paket = paket.kode_paket', 'left');
        return $this->db->get()->result();
    }

    public function update_status($kode_transaksi, $status)
    {
        $this->db->set('status', $status);
        $this->db->where('kode_transaksi', $kode_transaksi);
        $this->db->update('transaksi');
    }

    public function update_status1($kode_transaksi, $status, $tgl_ambil, $status_bayar)
    {
        $this->db->set('status', $status);
        $this->db->set('tgl_ambil', $tgl_ambil);
        $this->db->set('bayar', $status_bayar);
        $this->db->where('kode_transaksi', $kode_transaksi);
        $this->db->update('transaksi');
    }

    public function EditTransaksi($kode_transaksi)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('konsumen', 'transaksi.kode_konsumen = konsumen.kode_konsumen', 'left');
        $this->db->join('paket', 'transaksi.kode_paket = paket.kode_paket', 'left');
        $this->db->where('kode_transaksi', $kode_transaksi);
        return $this->db->get()->row_array();
    }

    public function detail($kode_transaksi)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('konsumen', 'transaksi.kode_konsumen = konsumen.kode_konsumen', 'left');
        $this->db->join('paket', 'transaksi.kode_paket = paket.kode_paket', 'left');
        $this->db->where('kode_transaksi', $kode_transaksi);
        return $this->db->get()->row_array();
    }

    // laporan
    public function filter_laporan($tgl_mulai, $tgl_ahir)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('konsumen', 'transaksi.kode_konsumen = konsumen.kode_konsumen', 'left');
        $this->db->join('paket', 'transaksi.kode_paket = paket.kode_paket', 'left');
        $this->db->where('transaksi.tgl_masuk>=', $tgl_mulai);
        $this->db->where('transaksi.tgl_masuk<=', $tgl_ahir);
        // $this->db->select_sum('transaksi.grand_total');
        return $this->db->get()->result();
    }

    public function grandtotransaksi($tgl_mulai, $tgl_ahir)
    {
        $this->db->select_sum('grand_total');
        $this->db->from('transaksi');
        $this->db->where('transaksi.tgl_masuk>=', $tgl_mulai);
        $this->db->where('transaksi.tgl_masuk<=', $tgl_ahir);
        return $this->db->get()->row_array();
    }
}
