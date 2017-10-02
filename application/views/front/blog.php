<!--=== Content Part ===-->  
<div class="container content">     
        <div class="row blog-page">
            <!-- Left Sidebar -->
            <div class="col-md-9 md-margin-bottom-40">
                <!--Blog Post-->
                <?php
                    foreach ($blogs as $row) {
                        $day = date("F j, Y",strtotime($row['date']));
                ?>
                    <div class="row blog blog-medium margin-bottom-40">
                        <div class="col-md-5">
                        <?php
                            if($this->crud_model->file_view('blog',$row['blog_id'],'','','thumb','src','','') !== ''){ 
                        ?>
                            <img class="img-responsive" src="<?php echo $this->crud_model->file_view('blog',$row['blog_id'],'','','thumb','src','',''); ?>" alt="">
                        <?php
                            } else { 
                        ?>
                            <img class="img-responsive" src="<?php echo base_url(); ?>uploads/blog_image/blog_0_thumb.jpg; ?>" alt="">
                        <?php } ?>   
                        </div>
                        <div class="col-md-7">
                            <h2><a href="<?php echo $this->crud_model->blog_link($row['blog_id']); ?>"><?php echo $row['title']; ?></a></h2>
                            <ul class="list-unstyled list-inline blog-info">
                                <li><i class="fa fa-calendar"></i> <?php echo $day; ?></li>
                                <li><i class="fa fa-pencil"></i> <?php echo $row['author']; ?></li>
                                <li><i class="fa fa-eye"></i> <?php echo $row['number_of_view']; ?></li>
                                <li><i class="fa fa-tags"></i><?php echo $this->db->get_where('blog_category',array('blog_category_id'=>$row['blog_category']))->row()->name; ?></li>
                            </ul>
                            <p><?php echo $row['summery']; ?></p>
                            <p><a class="btn-u btn-u-sm" href="<?php echo $this->crud_model->blog_link($row['blog_id']); ?>">Read More <i class="fa fa-angle-double-right margin-left-5"></i></a></p>
                        </div>
                    </div>
                    <hr class="margin-bottom-40">
                <?php
                    }
                ?>  
                <!--End Blog Post--> 
                <!--Pagination-->
                <div class="text-center">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
                <!--End Pagination--> 
            </div>
            <!-- End Left Sidebar -->

            <!-- Right Sidebar -->
            <div class="col-md-3">
                <!-- Blog Tags -->
                <div class="headline headline-md"><h2>Blog Tags</h2></div>
                <ul class="list-unstyled blog-tags margin-bottom-30">
                <?php
                    $category = $this->db->get('category')->result_array();
                    foreach($category as $row){
                ?>
                    <li><a href="<?php echo base_url(); ?>index.php/home/blog/<?php echo $row['category_id']; ?>"><i class="fa fa-tags"></i> <?php echo $row['category_name']; ?></a></li>
                <?php
                    }
                ?>
                </ul>
                <!-- End Blog Tags -->

                <!-- Posts -->
                <div class="posts margin-bottom-40 sdbar">
                    <div class="headline headline-md"><h2><?php echo translate('recent_blogs'); ?></h2></div>
                    <?php
                        $i = 0;
                        $this->db->limit(3);
                        $this->db->order_by('blog_id','desc');
                        $result = $this->db->get('blog')->result();
                        foreach ($result as $row) {
                        //$now = $this->db->get_where('blog',array('blog_id'=>$row2['blog_id']))->row();             
                    ?>
                    <dl class="dl-horizontal">
                        <dt>
                            <a href="<?php echo $this->crud_model->blog_link($row->blog_id); ?>">
                                <img src="<?php echo $this->crud_model->file_view('blog',$row->blog_id,'','','thumb','src','','one'); ?>" alt="" />
                            </a>
                        </dt>
                        <dd>
                            <p>
                                <a href="<?php echo $this->crud_model->blog_link($row->blog_id); ?>">
                                    <?php echo $row->title; ?>
                                </a>
                            </p>
                            <p>
                                <span>
                                    <?php echo date("F j, Y",strtotime($row->date)); ?>
                                </span>
                            </p>
                        </dd>
                    </dl>
                    <?php   
                        }
                    ?>
                </div><!--/posts-->
                <!-- End Posts -->

                <!-- Posts -->
                <div class="posts margin-bottom-40 sdbar">
                    <div class="headline headline-md"><h2><?php echo translate('popular_blogs'); ?></h2></div>
                    <?php
                        $i = 0;
                        $this->db->limit(3);
                        $this->db->order_by('number_of_view','desc');
                        $result = $this->db->get('blog')->result();
                        foreach ($result as $row2) {
                        //$now = $this->db->get_where('blog',array('blog_id'=>$row2['blog_id']))->row();             
                    ?>
                    <dl class="dl-horizontal">
                        <dt>
                            <a href="<?php echo $this->crud_model->blog_link($row2->blog_id); ?>">
                                <img src="<?php echo $this->crud_model->file_view('blog',$row2->blog_id,'','','thumb','src','','one'); ?>" alt="" />
                            </a>
                        </dt>
                        <dd>
                            <p>
                                <a href="<?php echo $this->crud_model->blog_link($row2->blog_id); ?>">
                                    <?php echo $row2->title; ?>
                                </a>
                            </p>
                            <p>
                                <span>
                                    <?php echo date("F j, Y",strtotime($row2->date)); ?>
                                </span>
                            </p>
                        </dd>
                    </dl>
                    <?php   
                        }
                    ?>
                </div><!--/posts-->
                <!-- End Posts -->
                
            </div>
        </div>          
    </div>