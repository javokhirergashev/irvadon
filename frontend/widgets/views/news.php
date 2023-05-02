<section class="blog-wrap pt-100 pb-75 bg-athens">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 offset-xl-3  col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                <div class="section-title style1 text-center mb-40">
                    <h2><?= Yii::t("app", "news") ?></h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <?php if (!empty($models)): ?>
                <?php foreach ($models as $model): ?>
                    <?php
                    $img = \common\models\StaticFunctions::getImage('news', $model->id, $model->image);
                    ?>
                    <div class="col-xl-4 col-lg-6 col-md-6 aos-init aos-animate" data-aos="fade-up"
                         data-aos-duration="1200" data-aos-delay="200">
                        <div class="blog-card style3">
                            <div class="blog-img">
                                <img src="<?= $img ?>" alt="Image">
                            </div>
                            <div class="blog-info">
<!--                                <a href="posts-by-date.html" class="blog-date"><span>25</span>Jun</a>-->
                                <ul class="blog-metainfo  list-style">
<!--                                    <li><i class="ri-user-unfollow-line"></i><a href="posts-by-author.html">Admin</a>-->
<!--                                    </li>-->
<!--                                    <li><i class="ri-wechat-line"></i>No Comment</li>-->
                                </ul>
                                <h3><a href="blog-details-right-sidebar.html"><?= $model->getTitle() ?> </a></h3>
                                <a href="blog-details-right-sidebar.html" class="link style2">Read More<i
                                            class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                    </div>
<<<<<<< HEAD
                    <div class="blog-info">
                        <a href="posts-by-date.html" class="blog-date"><span>25</span>Jun</a>
                        <ul class="blog-metainfo  list-style">
                            <li><i class="ri-user-unfollow-line"></i><a href="posts-by-author.html">Admin</a></li>
                            <li><i class="ri-wechat-line"></i>No Comment</li>
                        </ul>
                        <h3><a href="blog-details-right-sidebar.html">Telehealth Services Are Ready To Help Your Family </a></h3>
                        <a href="blog-details-right-sidebar.html" class="link style2"><?= Yii::t("app", "more") ?><i class="flaticon-right-arrow"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 aos-init aos-animate" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="300">
                <div class="blog-card style3">
                    <div class="blog-img">
                        <img  src="/frontend-files/img/blog/blog-4.jpg" alt="Image">
                    </div>
                    <div class="blog-info">
                        <a href="posts-by-date.html" class="blog-date"><span>18</span> Jun</a>
                        <ul class="blog-metainfo  list-style">
                            <li><i class="ri-user-unfollow-line"></i><a href="posts-by-author.html">Admin</a></li>
                            <li><i class="ri-wechat-line"></i>No Comment</li>
                        </ul>
                        <h3><a href="blog-details-right-sidebar.html">10 Tips To Lead A Healthy And Happy Life</a></h3>
                        <a href="blog-details-right-sidebar.html" class="link style2">Read More<i class="flaticon-right-arrow"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 aos-init aos-animate" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="400">
                <div class="blog-card style3">
                    <div class="blog-img">
                        <img  src="/frontend-files/img/blog/blog-5.jpg" alt="Image">
                    </div>
                    <div class="blog-info">
                        <a href="posts-by-date.html" class="blog-date"><span>12</span>May</a>
                        <ul class="blog-metainfo  list-style">
                            <li><i class="ri-user-unfollow-line"></i><a href="posts-by-author.html">Admin</a></li>
                            <li><i class="ri-wechat-line"></i>No Comment</li>
                        </ul>
                        <h3><a href="blog-details-right-sidebar.html">The Day I'd Spent At Square Medical Center</a></h3>
                        <a href="blog-details-right-sidebar.html" class="link style2">Read More<i class="flaticon-right-arrow"></i></a>
                    </div>
                </div>
            </div>
=======
                <?php endforeach; ?>
            <?php endif; ?>
>>>>>>> 822c7c212525d1f3ec3d65af8df9fc7ab913649f
        </div>
    </div>
</section>