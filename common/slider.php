<div class="container-fluid pt-5 mb-3">
        <div class="container">
            <div class="section-title">
                <h4 class="m-0 text-uppercase font-weight-bold">Trending News</h4>
            </div>
            <div class="owl-carousel news-carousel carousel-item-4 position-relative">

            <?php 
            $week = time()-(604800);
            $top_news = mysqli_query($conn,"SELECT * FROM post  WHERE  status='Publish' AND time > ".$week." ORDER BY visits DESC");
            while($row = mysqli_fetch_assoc($top_news)){?>

                <div class="position-relative overflow-hidden" style="height: 300px;">
                    <img class="img-fluid h-100" src="admin/upload/<?php echo $row['img']?>" style="object-fit: cover;">
                    <div class="overlay">
                        <div class="mb-2">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                href="./single.php"><?php echo $row['category']?></a>
                            <a class="text-white" href="./single.php"><small><?php date('d-m-y', $row['time']);?></small></a>
                        </div>
                        <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="single.php?id=<?php echo $row['id']?>"><?php echo $row['title']?></a>
                    </div>
                </div>

                <?php } ?>
            </div>
        </div>
    </div>