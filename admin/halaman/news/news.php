<!-- koneksi -->
<!-- bisa menggunakan msql atau msqli(improve)  -->
<?php
    include "models/m_news.php";

    // memanggil variabel koneksi yang ada di dalam index
    $news = new news ($koneksi);


?>


<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">News</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">News</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <div class="col">
                        <h3 class="card-title">Data News</h3>
                    </div>
                    <div class="col text-right">
                        <a href="#" class="btn btn-sm btn-secondary" data-toggle="modal"
                                        data-target="#modalTambah">Tambah</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Judul</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no=1;
                            $tampil = $news -> tampilBerita();
                            while($data_news = $tampil -> fetch_object()):
                            ?>
                            <tr>
                                <td align="center"> <?= $no++ .'.' ?> </td>
                                <td ><img width="20%" src="img/news/<?= $data_news -> gambar ?>"> </td> 
                                <td> <?= $data_news -> judul ?> </td>
                                <td> <?= $data_news -> tanggal ?> </td>
                                <td>
                                <a href="#" id="ubah_berita" class="btn btn-sm btn-danger" data-toggle="modal"
                                    data-target="#modalUbah" data-id="<?php echo $data_news->id; ?>" data-gbr="<?php echo $data_news->gambar; ?>" data-jdl="<?php echo $data_news->judul; ?>" data-tgl="<?php echo $data_news->tanggal; ?>">Ubah</a> | 
                                <a href="#" id="hapus_berita" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#modalHapus" data-id="<?php echo $data_news->id; ?>">Hapus</a>
                                </td>
                            </tr>
                            <?php
                            endwhile;
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>

<div class="modal fade" id="modalTambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukan Judul" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal"
                                placeholder="masukan tanggal (30 Dec 2000)" required>
                        </div>
                        <div class="form-group row">
                            <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="foto" name="foto" required>
                            </div>
                        </div>   
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="submit" name="tambah" value="simpan" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
            
            <?php
                if(@$_POST['tambah']){
                // $gambar = $koneksi->conn->real_escape_string($_POST['gambar']);
                $judul = $koneksi->conn->real_escape_string($_POST['judul']);
                $tanggal = $koneksi->conn->real_escape_string($_POST['tanggal']);

                $extensi = explode(".",$_FILES['foto']['name']);
                $namabaru = $judul.".".end($extensi);
                $sumber = $_FILES['foto']['tmp_name'];
                
                    $maxDimW = 300;
                    $maxDimH = 300;
                    list($width, $height, $type, $attr) = getimagesize( $sumber );
                    if ( $width > $maxDimW || $height > $maxDimH ) {
                        $target_filename = $sumber ;
                        $fn = $sumber;
                        $size = getimagesize( $fn );
                        $ratio = $size[0]/$size[1]; // width/height
                        if( $ratio > 1) {
                            $width = $maxDimW;
                            $height = $maxDimH/$ratio;
                        } else {
                            $width = $maxDimW*$ratio;
                            $height = $maxDimH;
                        }
                        $src = imagecreatefromstring(file_get_contents($fn));
                        $dst = imagecreatetruecolor( $width, $height );
                        imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );

                        imagejpeg($dst, $target_filename);
                    }
                

                $upload = move_uploaded_file($sumber, 'img/news/'.$namabaru);
                if($upload){
                    $news->tambahBerita($namabaru, $judul, $tanggal);
                    header('location: ?page=news');
                }else{
                    echo "<script>alert('upload tidak berhasil')</script>";
                }
            }
        ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- modal Hapus -->

<div class="modal fade" id="modalHapus">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Hapus Data</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
            <div class="modal-body">
                <input type="hidden" id="id_news" name="id_news">
                <p>Apakah data dihapus... ?</p>           
            </div>
            <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="submit" id="hapus" name="hapus" value="hapus" class="btn btn-primary">Hapus</button>
            </div>
        </form>    
        <?php
        if(@$_POST['hapus']){
            $idnews = $_POST['id_news'];
            if($idnews != ''){         
                $foto_awal = $news->tampilBerita($idnews)->fetch_object()->foto;
                unlink('img/news/'.$foto_awal); 
                
                $news->hapusNews($idnews);
                header('location: ?page=news');
            }else {
                echo "<script>alert('Hapus Gagal Broo..!')</script>";
            }          
        }
        ?>  
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- modal ubah -->
<div class="modal fade" id="modalUbah">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Rubah Data</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form class="form-horizontal" id="form" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group row">
                    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="hidden" id="id_news" name="id_news">
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">tanggal</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                    <div style="padding-bottom:5px;">
                        <img src="" alt="" width="80px" id="gambar" class="img-thumbnail">
                    </div>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="foto" name="foto">
                    </div>
                </div>     
            
            </div>
            <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="submit" id="ubah" name="ubah" value="simpan" class="btn btn-primary">Simpan</button>
            </div>
        </form>      
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script src="aset/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
    $(document).on('click','#hapus_berita',  function(){
    var idnews = $(this).data('id');
    
    $('#modalHapus #id_news').val(idnews);
    });

    $(document).on('click','#ubah_berita', function(){
        var idnews = $(this).data('id');
        var judul = $(this).data('jdl');
        var tanggal = $(this).data('tgl');
        var foto = $(this).data('gbr');

        $('#modalUbah #id_news').val(idnews);
        $('#modalUbah #judul').val(judul);
        $('#modalUbah #tanggal').val(tanggal);
        $('#modalUbah #gambar').attr("src","img/news/"+foto);
    });

    $(document).ready(function(e){
        $('#form').on('submit', (function(e){
        e.preventDefault();
        $.ajax({
            url:'Models/ubah_berita.php',
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(pesan){
            $('.table').html(pesan);
            }
            })
        })
        )
    });


</script>