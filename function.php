<?php
                 
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














?>