<?php
    class news
    {
        private $mysql;
        function __construct($conn)
        {
            $this -> mysql = $conn;
        }

        public function tampilBerita($id = null)
        {
            $db = $this->mysql -> conn;
            $sql = "SELECT * FROM berita";

            if($id != null){
                $sql .= " where id = $id";
            }

            $query = $db->query($sql)or die($db -> error);
            return $query;
        }
        
        public function tambahBerita($gambar, $judul, $tanggal)
        {
            $db = $this->mysql->conn;
            $sql = "Insert into berita values('', '$gambar', '$judul', '$tanggal')";
            $db -> query($sql) or die ($db->error);
        }

        public function hapusNews($id)
        {
            $db = $this->mysql->conn;
            $db->query("Delete From berita Where id='$id'") or die ($db->error);
        }

        public function ubah($sql)
        {
            $db = $this->mysql->conn;
            $db->query($sql) or die ($db -> error);
        }
    }
?>
