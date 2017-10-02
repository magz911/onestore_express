<?php
    foreach ($blog as $row) {
?>
    <div class="container content">
        <div class="row blog-page blog-item">
            <!-- Left Sidebar -->
            <div class="col-md-9 md-margin-bottom-60">
                <!--Blog Post-->   
                <?php
                    $day = date("F j, Y",strtotime($row['date']));
                ?>     
                <div class="blog margin-bottom-40">
                    <h2><?php echo $row['title']; ?></h2>
                    <div class="blog-post-tags">
                        <ul class="list-unstyled list-inline blog-info">
                            <li><i class="fa fa-calendar"></i><?php echo $day; ?></li>
                            <li><i class="fa fa-pencil"></i><?php echo $row['author']; ?></li>
                            <li><i class="fa fa-eye"></i> <?php echo $row['number_of_view']; ?></li>
                            <li><i class="fa fa-tags"></i><?php echo $this->db->get_where('blog_category',array('blog_category_id'=>$row['blog_category']))->row()->name; ?></li>
                        </ul>                    
                    </div>
                    <div class="blog-img">
                        <img class="img-responsive" style="width:100%;" src="<?php echo $this->crud_model->file_view('blog',$row['blog_id'],'','','no','src','',''); ?>" alt="">
                    </div>
                    <p><?php echo $row['description']; ?></p>
                </div>
                <!--End Blog Post-->

                <hr>

                <?php
                    $discus_id = $this->db->get_where('general_settings',array('type'=>'discus_id'))->row()->value;
                    $fb_id = $this->db->get_where('general_settings',array('type'=>'fb_comment_api'))->row()->value;
                    $comment_type = $this->db->get_where('general_settings',array('type'=>'comment_type'))->row()->value;
                ?>  
                <div class="row" <?php if($comment_type == ''){ ?>style="display:none;"<?php } ?>>
                    <div class="col-md-12">
                        <?php if($comment_type == 'disqus'){ ?>
                        <div id="disqus_thread"></div>
                        <script type="text/javascript">
                            /* * * CONFIGURATION VARIABLES * * */
                            var disqus_shortname = '<?php echo $discus_id; ?>';
                            
                            /* * * DON'T EDIT BELOW THIS LINE * * */
                            (function() {
                                var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                                dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                            })();
                        </script>
                        <script type="text/javascript">
                            /* * * CONFIGURATION VARIABLES * * */
                                var disqus_shortname = '<?php echo $discus_id; ?>';
                            
                            /* * * DON'T EDIT BELOW THIS LINE * * */
                            (function () {
                                var s = document.createElement('script'); s.async = true;
                                s.type = 'text/javascript';
                                s.src = '//' + disqus_shortname + '.disqus.com/count.js';
                                (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
                            }());
                        </script>
                        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
                        <?php
                            }
                            else if($comment_type == 'facebook'){
                        ?>

                            <div id="fb-root"></div>
                            <script>(function(d, s, id) {
                              var js, fjs = d.getElementsByTagName(s)[0];
                              if (d.getElementById(id)) return;
                              js = d.createElement(s); js.id = id;
                              js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=<?php echo $fb_id; ?>";
                              fjs.parentNode.insertBefore(js, fjs);
                            }(document, 'script', 'facebook-jssdk'));</script>
                            <div class="fb-comments" data-href="<?php echo $this->crud_model->product_link($row['product_id']); ?>" data-numposts="5"></div>

                        <?php
                            }
                        ?>
                    </div>
                </div>
                    
            </div>
            <!-- End Content -->

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
                        $a = $this->db->get('blog')->result_array();
                        foreach ($a as $row2) {
                        $now = $this->db->get_where('blog',array('blog_id'=>$row2['blog_id']))->row();             
                    ?>
                    <dl class="dl-horizontal">
                        <dt>
                            <a href="<?php echo $this->crud_model->blog_link($now->blog_id); ?>">
                                <img src="<?php echo $this->crud_model->file_view('blog',$now->blog_id,'','','thumb','src','','one'); ?>" alt="" />
                            </a>
                        </dt>
                        <dd>
                            <p>
                                <a href="<?php echo $this->crud_model->blog_link($now->blog_id); ?>">
                                    <?php echo $now->title; ?>
                                </a>
                            </p>
                            <p>
                                <span>
                                    <?php echo date("F j, Y",strtotime($now->date)); ?>
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
                        $a = $this->db->get('blog')->result_array();
                        foreach ($a as $row2) {
                        $now = $this->db->get_where('blog',array('blog_id'=>$row2['blog_id']))->row();             
                    ?>
                    <dl class="dl-horizontal">
                        <dt>
                            <a href="<?php echo $this->crud_model->blog_link($now->blog_id); ?>">
                                <img src="<?php echo $this->crud_model->file_view('blog',$now->blog_id,'','','thumb','src','','one'); ?>" alt="" />
                            </a>
                        </dt>
                        <dd>
                            <p>
                                <a href="<?php echo $this->crud_model->blog_link($now->blog_id); ?>">
                                    <?php echo $now->title; ?>
                                </a>
                            </p>
                            <p>
                                <span>
                                    <?php echo date("F j, Y",strtotime($now->date)); ?>
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
<?php
    }
?>