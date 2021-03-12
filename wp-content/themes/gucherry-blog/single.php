<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package gucherry-blog
 */

get_header();

$args = array(
    'post_id' => get_the_ID(),
    'parent' => 0,
    'count'   => true
);
$comments_count = get_comments( $args );


// $args = array(
//     'post_id' => get_the_ID(),
//     'hierarchical' => true,
//     'status'    => 'approve',
//     'order' => 'DESC',
//     'orderby' => 'comment_date',
//     'parent' => 0
// );
// $comments = get_comments( $args );

// $commentDatas = [];
// foreach($comments as $key => $comment) {
//     if ($comment->comment_parent == 0) {
//         $commentDatas[$comment->comment_ID]['comment'] = (array)$comment;
//         $commentDatas[$comment->comment_ID]['child_comment'] = [];
//     } else {
//         $commentDatas[$comment->comment_parent]['child_comment'][] = (array)$comment;
//     }
// }

?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <amp-state id="isShowComment">
        <script type="application/json">false</script>
    </amp-state>

    <amp-state id="isLogin">
        <script type="application/json"><?= is_user_logged_in() ? true : false ?></script>
    </amp-state>

    <div class="container">
        <div class="row flex-row-between col-12">
            <div class="col-8">
                <div>
                    <article class="detail-main bg-white">
                        <header>
                            <div class="meta-info mb20"><span><?= get_the_date('Y-m-d H:i:s') ?></span><span>1052 字</span><a href="#ikari"><?= $comments_count ?> 条评论</a></div>
                            <div class="actions"><a class="complaint-btn">举报</a></div>
                            <?php $tags = get_the_tags(get_the_ID()); ?>

                                <?php if ($tags) { ?>
                                    <div class="tag-group">
                                    <?php foreach($tags as $tag) { ?>
                                        <a class="dm-tag dm-tag-a " href="/tag/358418?_source_page=detail" target="_blank" title="">
                                        <i type="original" style="margin-right:3px" class="iconfont icon-original"></i>
                                        <span><?= $tag->name ?></span>
                                        </a>
                                    <?php } ?>
                                    </div>
                                <?php } ?>
                            <!-- <a class="dm-tag dm-tag-a " href="/tag/358418?_source_page=detail" target="_blank" title=""><i type="original" style="margin-right:3px" class="iconfont icon-original"></i><span>鬼灭之刃</span></a><a class="dm-tag dm-tag-a " href="/tag/20659579?_source_page=detail" target="_blank" title=""><span>鬼灭之刃同人漫画评论</span></a><a class="dm-tag dm-tag-a " href="/tag/2857?_source_page=detail" target="_blank" title=""><span>漫画</span></a><a class="dm-tag dm-tag-a " href="/tag/18954?_source_page=detail" target="_blank" title=""><span>漫评</span></a><a class="dm-tag dm-tag-a " href="/tag/48220?_source_page=detail" target="_blank" title=""><span>评论</span></a><a class="dm-tag dm-tag-a " href="/tag/706645?_source_page=detail" target="_blank" title=""><span>漫画评论</span></a></div> -->
                        </header>
                        <div class="content">
                            <h1 class="title"><?= get_the_title(get_the_ID()) ?></h1>
                            <div>
                                <!-- <p class="series-collection" style="font-size:20px">
                                    来自合集&nbsp;<a class="series-name">评论、分析、剧情总结</a><span class="series-focus">&nbsp;·&nbsp;关注合集</span>
                                </p> -->
                            </div>
                            <div class="main-body size-m" style="text-indent:0">
                                <?= get_the_content() ?>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="banner">

                </div>
                <div>
                    <div id="ikari" class="comment-list-container _box">
                        <div class="comment-container clearfix">
                            <form action="" method="POST">
                                <div class="mentions">
                                        <textarea class="dm-textarea comment-input" on="input-throttled:AMP.setState({isShowComment:
                                            event.value.length > 0 ? false : true
                                        })"
                                        rows="4" placeholder="" style="overflow-x: hidden; overflow-wrap: break-word; height: 90px;"></textarea>
                                        <div class="test" style="font: 14px / 24px -apple-system, &quot;Helvetica Neue&quot;, &quot;PingFang SC&quot;, &quot;\\5FAE软雅黑&quot;, &quot;\\5B8B体&quot;, &quot;\\9ED1体&quot;, arial, sans-serif; border: 1px solid rgb(233, 233, 240); padding: 5px 10px; height: 90px; width: 830px;"></div>
                                </div>
                                <button class="dm-btn l-right dm-btn-primary dm-btn-size-default" [class]="'dm-btn l-right dm-btn-primary dm-btn-size-default' + (isShowComment == true ? 'dm-btn-disabled' : '')" style="font-size:18px;padding:0 15px" type="button" [disabled]="isActive"><span>评 论</span></button>
                            </form>
                        </div>
                        <div class="total-num">
                            <div class="total-num-block total-num-main"><?= $comments_count ?>&nbsp;Bình luận</div>
                            <!-- <div class="total-num-block total-num-tags"><span class="total-num-tag active">按热度顺序</span><span class="total-num-tag ">按发布顺序</span></div> -->
                        </div>
                        <div>
                        <amp-list id="myList" src="https://foo.com/list.json">
                            <template type="amp-mustache">
                                <div>{{title}}</div>
                            </template>
                        </amp-list>
                            <amp-list width="auto"
                                height="auto"
                                [src]="comments.items"
                                src="<?= admin_url() . 'admin-ajax.php?action=get_list_comment&page=1&limit=12' ?>"
                                binding="refresh"
                                load-more="manual"
                                load-more-bookmark="next"
                                >
                                    <template type="amp-mustache">
                                        <div class="comment-item fade-enter-done overflow-hidden">
                                            
                                        </div>
                                    </template>
                                    <div fallback>
                                        FALLBACK
                                    </div>
                                    <div placeholder>
                                        PLACEHOLDER
                                    </div>
                                    <amp-list-load-more load-more-failed>
                                        ERROR
                                    </amp-list-load-more>
                                    <amp-list-load-more load-more-end>
                                        END
                                    </amp-list-load-more>
                            </amp-list>
                            <amp-state id="comment" src="<?= admin_url() . 'admin-ajax.php?action=get_list_comment&page=1&limit=12' ?>"></amp-state>
                            <amp-state id="post">
                                <script type="application/json">
                                    {
                                        "moreItemsPageIndex": 2,
                                        "hasMorePages": true
                                    }
                                </script>
                            </amp-state>
                            <form method="GET" class="mt-4 pb-4"
                                action="<?= admin_url() . 'admin-ajax.php?action=get_list_comment' ?>"
                                action-xhr="<?= admin_url() . 'admin-ajax.php?action=get_list_comment' ?>"
                                target="_top"
                                on="submit-success: AMP.setState({
                                comments: {
                                    items: comments.items.concat(event.response.items)
                                },
                                post: {
                                    moreItemsPageIndex: post.moreItemsPageIndex - 1,
                                    hasMorePages: !!event.response.next
                                }
                                });">
                                <input type="hidden" name="action" value="get_list_comment">
                                <input type="hidden" name="page" value="1" [value]="post.moreItemsPageIndex">
                                <input type="hidden" name="limit" value="12">
                                <input type="submit" value="Show more" [hidden]="!post.hasMorePages">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php
get_footer();
