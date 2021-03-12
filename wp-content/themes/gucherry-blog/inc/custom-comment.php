<?php

add_action('wp_ajax_nopriv_get_list_comment', 'get_list_comment');
add_action('wp_ajax_get_list_comment', 'get_list_comment');


function get_list_comment() {
    global $wpdb;

    $limit = 12;
    $page = $_REQUEST['page'];
    $offset = ($page * $limit) - $limit;

    $args = array(
        'post_id' => get_the_ID(),
        'hierarchical' => true,
        'status'    => 'approve',
        'order' => 'DESC',
        'orderby' => 'comment_date',
        'number' => 12,
        'offset' => $offset,
        'parent' => 0
    );
    $comments = get_comments( $args );
    
    $commentData = [];
    foreach($comments as $key => $comment) {
        if ($comment->comment_parent == 0) {
            $commentData[$comment->comment_ID]['comment'] = (array)$comment;
            $commentData[$comment->comment_ID]['child_comment'] = [];
        } else {
            $commentData[$comment->comment_parent]['child_comment'][] = (array)$comment;
        }
    }
    $data = [];
    foreach($commentData as $comment) {
        $data[] = $comment;
    }
    echo json_encode(array('items' => $data, 'next' => ''));
    exit;
}

function get_list_child_comment() {

}