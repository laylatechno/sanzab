   <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb-area bg-img" style="background-image: url(<?php echo base_url() ?>assets/front/img/bg-img/breadcumb.jpg);">
        <div class="bradcumbContent">
            <h2>Berita</h2>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Blog Area Start ##### -->
    <div class="blog-area mt-50 section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="academy-blog-posts">
                        <div class="row">
                        <?php foreach($berita as $p ) {?>
                            <!-- Single Blog Start -->
                            <div class="col-12">
                                <div class="single-blog-post mb-50 wow fadeInUp" data-wow-delay="300ms">
                                    <!-- Post Thumb -->
                                    <div class="blog-post-thumb mb-50">
                                        <img src="<?php echo base_url('upload/berita/'.$p->gambar) ?>" alt="">
                                    </div>
                                    <!-- Post Title -->
                                    <a href="<?php echo base_url('berita/detail/'.$p->slug) ?>" class="post-title"><?php echo $p->judul ?></a>
                                    <!-- Post Meta -->
                                    <div class="post-meta">
                                        <p>By <a href="<?php echo base_url() ?>"><?php echo $p->pengguna ?></a> | <a href="<?php echo base_url() ?>"><?php echo $p->tanggal_input ?></a> | <a href="<?php echo base_url() ?>"></a></p>
                                    </div>
                                    <!-- Post Excerpt -->
                                    <p><?php echo character_limiter($p->deskripsi,150) ?></p>
                                    <!-- Read More btn -->
                                    <a href="<?php echo base_url('berita/detail/'.$p->slug) ?>" class="btn academy-btn btn-sm mt-15">Read More</a>
                                </div>
                            </div>
        
                         <?php } ?>
                          
                        </div>
                    </div>
                     <div class="pagination flex-m flex-w p-t-26">
             <?php echo $pagin; ?>
          </div>

                </div>

                <div class="col-12 col-md-4">
                    <div class="academy-blog-sidebar">
                        <!-- Blog Post Widget -->
                       <!--  <div class="blog-post-search-widget mb-30">
                            <form action="#" method="post">
                                <input type="search" name="search" id="Search" placeholder="Search">
                                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                        </div> -->

                        <!-- Blog Post Catagories -->
                        <div class="blog-post-categories mb-30">
                            <h5>Kategori</h5>
                            <ul>
                            <?php foreach($listing_kategori_berita as $p) {?>
                                <li><a href="<?php echo base_url('berita/kategori_berita/'.$p->slug_kategori_berita) ?>"><?php echo $p->nama_kategori_berita ?></a></li>
                              
                                   <?php } ?>
                            </ul>
                        </div>

                        <!-- Latest Blog Posts Area -->
                        <div class="latest-blog-posts mb-30">
                            <h5>Berita Rekomendasi</h5>

                               <?php foreach($listing_berita_rekomendasi as $p ) {?>
                            <!-- Single Latest Blog Post -->
                            <div class="single-latest-blog-post d-flex mb-30">
                                <div class="latest-blog-post-thumb">
                                    <img src="<?php echo base_url('upload/berita/'.$p->gambar) ?>" alt="">
                                </div>
                                <div class="latest-blog-post-content">
                                    <a href="<?php echo base_url('berita/detail/'.$p->slug) ?>" class="post-title">
                                        <h6><?php echo $p->judul ?></h6>
                                    </a>
                                    <a href="<?php echo base_url() ?>" class="post-date"><?php echo $p->tanggal_input ?>  </a>
                                </div>
                            </div>

                              <?php } ?>
                     
                        </div>

                        <!-- Add Widget -->
                        <div class="add-widget">
                            <a href=""><img src="<?php echo base_url() ?>assets/front/img/blog-img/banner.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Blog Area End ##### -->