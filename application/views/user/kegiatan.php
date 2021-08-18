<!-- breadcrumb start-->
<style type="text/css">
.dis{
  display: none;
  transition: all 0.3s ease;
}
</style>
<section class="breadcrumb breadcrumb_bg">
  <div class="container">
   <div class="row">
    <div class="col-lg-12">
     <div class="breadcrumb_iner text-center">
      <div class="breadcrumb_iner_item">
       <h3 style="color: white"><?php echo $kegiatan['nama_kegiatan'] ?></h3>
       <p>Kegiatan<span>-</span><?php echo $kegiatan['nama_sanggar'] ?></p>
     </div>
   </div>
 </div>
</div>
</div>
</section>
<!-- breadcrumb start-->
<!--================Blog Area =================-->
<section class="blog_area single-post-area section_padding">
 <div class="container">
  <div class="row">
   <div class="col-lg-8 posts-list">
    <div class="single-post">
     <div class="feature-img">
      <img style="width: 100%;height: 400px" class="img-fluid" src="<?php echo base_url('upload/kegiatan/') ?><?php echo $kegiatan['foto_kegiatan'] ?>" alt="">
    </div>
    <div class="blog_details">
      <h2><?php echo $kegiatan['nama_kegiatan'] ?>
    </h2>
    <ul class="blog-info-link mt-3 mb-4">
      <li><a href="#"><i class="far fa-user"></i> Kegiatan - <?php echo $kegiatan['nama_sanggar']; ?></a></li>
      <li><a href="#"><i class="far fa-comments"></i> <?php echo $jumlah['jumlah_koment'] ?> Comments</a></li>
    </ul>
    <p class="excert">
     <?php echo $kegiatan['deskripsi_kegiatan'] ?>
   </p>
 </div>
</div>
<div class="comments-area">
 <h4><?php echo $jumlah['jumlah_koment'] ?> Comments</h4>

 <?php foreach ($koment as $key => $value) {
                     # code...
   $id_komentar = $value->id_komentar;
   ?>
   <div class="comment-list">
    <div class="single-comment justify-content-between d-flex">
     <div class="user justify-content-between d-flex">
      <div class="m-3" style="display:flex; height: 60px; width: 60px; border-radius: 50%; background-color: #fb839e; align-items: center; justify-content: center;">
       <p style="color: white"> <?php echo strtok($value->nama_komentar, " ") ?></p>
     </div>
     <div class="desc">
       <p class="comment">
        <?php echo $value->email_komentar ?> 
      </p>
      <div class="d-flex justify-content-between">
       <div class="d-flex align-items-center">
        <h5>
         <a href="#"><?php echo $value->komen ?></a>
       </h5>
       <p class="date"><?php echo date('d M', strtotime( $value->tanggal_komentar)) ?></p>
     </div>
     <div class="reply-btn">
      <?php $queryJ = $this->db->query("SELECT count(id_balas) as jumlah_balas from balas_komentar where id_komentar = $id_komentar");

      if($queryJ->num_rows() > 0){ ?>
        <a style="text-transform: capitalize;" type="button" class="btn-reply b-<?php echo $value->id_komentar ?>"><?php echo $queryJ->row('jumlah_balas'); ?> Balasan</a>
      <?php } ?>
    </div>
  </div>
</div>
</div>
</div>
<?php
$queryBalas = $this->db->query("SELECT * FROM balas_komentar where id_komentar = '$id_komentar'")->result();

foreach ($queryBalas as $qr) {
                          # code...
  ?>
  <div class="balas<?php echo $value->id_komentar ?> ml-5 mt-2 dis">
   <div class="single-comment justify-content-between d-flex">
    <div class="user justify-content-between d-flex">
     <div class="m-3" style="display:flex; height: 40px; width: 40px; border-radius: 50%; background-color: #2eb1ed; align-items: center; justify-content: center;">
       <p style="color: white; font-size: 10px"> Balasan</p>
     </div>
     <div class="desc">
       <p class="comment">
         ketua sanggar : <?php echo $kegiatan['nama_ketua'] ?>
       </p>
       <div class="d-flex justify-content-between">
         <div class="d-flex align-items-center">
          <h5>
           <a href="#"><?php echo $qr->balas_komen?></a>
         </h5>
         <p class="date"><?php echo date('d M', strtotime($qr->tanggal_balasan)) ?></p>
       </div>
     </div>
   </div>
 </div>
</div>
</div>
<?php } ?>
</div>  
<?php } ?>        
</div>
<div class="comment-form">
 <h4>Tinggalkan Komentar</h4>
 <form method="POST" class="form-contact comment_form" action="<?php echo base_url('user/koment/'.$kegiatan['id_sanggar'].'/'.$kegiatan['id_kegiatan']) ?>" id="commentForm">
  <div class="row">
   <div class="col-12">
    <div class="form-group">
     <textarea class="form-control w-100" name="komentar" id="comment" cols="30" rows="9"
     placeholder="Tulis Komentar" required></textarea>
   </div>
 </div>
 <div class="col-sm-6">
  <div class="form-group">
   <input class="form-control" name="nama" id="name" type="text" placeholder="Nama Anda" required>
 </div>
</div>
<div class="col-sm-6">
  <div class="form-group">
   <input class="form-control" name="email" id="email" type="email" placeholder="Email" required>
 </div>
</div>
</div>
<div class="form-group">
 <button type="submit" class="button btn_1 button-contactForm">Send Message</button>
</div>
</form>
</div>
</div>
<div class="col-lg-4">
 <div class="blog_right_sidebar">

  <aside class="single_sidebar_widget popular_post_widget">
    <h3 class="widget_title">Recent Post</h3>
    <?php foreach ($semuaKegiatan as $key => $value) {
                        # code...
      ?>
      <div class="media post_item">
       <img style="height: 70px; width: 90px;" src="<?php echo base_url('upload/kegiatan/') ?><?= $value->foto_kegiatan ?>" alt="post">
       <div class="media-body">
        <a href="single-blog.html">
         <h3><?php echo $value->nama_kegiatan ?></h3>
       </a>
       <p>January 12, 2019</p>
     </div>
   </div>
 <?php } ?>
</aside>
</div>
</div>
</div>
</div>
</section>
<!--================Blog Area end =================-->

<script type="text/javascript">
 <?php foreach ($koment as $key => $value) {
            # code...
  ?>
  const klik<?php echo $value->id_komentar; ?> = document.querySelector('.b-<?php echo $value->id_komentar ?>');

  klik<?php echo $value->id_komentar; ?>.addEventListener('click',()=>{
   document.querySelector('.balas<?php echo $value->id_komentar ?>').classList.toggle('dis');
 })
<?php } ?>
</script>