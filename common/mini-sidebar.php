                    <div class="col-lg-4">
                    <!------------- ad --------->
                    <?php $ad = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM ad WHERE position=7 ORDER BY RAND() LIMIT 1"));
                        if($ad>0){ ?>

                    <div class="border mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Advertisement</h4>
                        </div>
                        <div class="col-12">
                            <div style="margin:0;" class="section-title">
                                <?php echo $ad['embed'];?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <!------------- ad --------->

                    <!-- Newsletter Start -->
                    <?php include("newsletter.php")?>
                    <!-- Newsletter End -->
                </div>