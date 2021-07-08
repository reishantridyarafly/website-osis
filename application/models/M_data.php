<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_data extends CI_Model
{
     //cek login
     public function cek_login($table, $where)
     {
          return $this->db->get_where($table, $where);
     }

     //tampilkan data
     public function get_data($table, $nama = null, $order_by = null)
     {
          $this->db->order_by($nama, $order_by);
          return $this->db->get($table);
     }

     //update data / edit data
     public function update_data($where, $data, $table)
     {
          $this->db->where($where);
          $this->db->update($table, $data);
     }

     //tambah data
     public function insert_data($data, $table)
     {
          $this->db->insert($table, $data);
     }

     //tampilakan data berdasarkan id
     public function edit_data($where, $table)
     {
          return $this->db->get_where($table, $where);
     }

     //Hapus Data
     public function delete_data($where, $table)
     {
          $this->db->delete($table, $where);
     }
}
