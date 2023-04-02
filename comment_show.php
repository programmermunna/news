                <!-- Comment List Start -->
                <div class="border mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">3 Comments</h4>
                    </div>

                    <?php                 
                    
                    ?>
                    <div class="bg-white border border-top-0 p-4">
                    <?php                    
                    $comment = mysqli_query($conn,"SELECT * FROM comment WHERE post_id=$id");
                    while ($row = mysqli_fetch_assoc($comment)) {
                        $arr[] = $row;
                    }                    
                    $arr = buildTree($arr);
                    function buildTree(Array $data, $parent = 0) {
                        $tree = array();
                        foreach ($data as $d) {
                            if ($d['parent_id'] == $parent) {
                                $children = buildTree($data, $d['id']);
                                // set a trivial key
                                if (!empty($children)) {
                                    $d['_children'] = $children;
                                }
                                $tree[] = $d;
                            }
                        }
                        return $tree;
                    }

                    function printTree($arr, $r = 0, $p = null) {
                        foreach ($arr as $i => $t) {
                            $dash = ($t['parent_id'] == 0) ? '' : str_repeat('30+',$r);
                            $dash = array_sum(explode( '+', $dash));
                            $img = $t['img'];
                            $name = $t['name'];
                            $content = $t['content'];
                            $comment_id = $t['id'];
                            $time = date('d-m-y',$t['time']);
                            $post_id = $_GET['id'];
                        echo "<div style='border-bottom:1px solid gray;overflow-wrap: anywhere;'>";
                                echo "<div style='padding-left:".$dash."px;margin:20px;display:flex;'>
                                <img style='width:40px;height:40px;margin-right:10px;' src='admin/upload/$img' alt='img'>                              
                                    <div>
                                        <h4>$name <span style='font-size:14px'>$time</span> </h4>                                     
                                        <p>$content</p>
                                        <a style='padding:5px 10px;border:1px solid gray;color:gray' href='single.php?id=$post_id&&comment=$comment_id'>Reply</a>                                   
                                    </div>
                                </div>";
                        echo "</div>";
                           
                            if (isset($t['_children'])) {
                                echo "<div>";
                                printTree($t['_children'], ++$r, $t['parent_id']);
                                --$r;
                                echo "</div>";
                            }
                        }
                    }                    
                    printTree($arr);
                    ?>
                    </div>
                </div>
                <!-- Comment List End--->