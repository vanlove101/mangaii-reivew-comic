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


$args = array(
    'post_id' => get_the_ID(),
    'hierarchical' => true,
    'status'    => 'approve',
    'order' => 'DESC',
    'orderby' => 'comment_date',
    'parent' => 0
);
$comments = get_comments( $args );

$commentDatas = [];
foreach($comments as $key => $comment) {
    if ($comment->comment_parent == 0) {
        $commentDatas[$comment->comment_ID]['coment'] = (array)$comment;
        $commentDatas[$comment->comment_ID]['child_comment'] = [];
    } else {
        $commentDatas[$comment->comment_parent]['child_comment'][] = (array)$comment;
    }
}

?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
                                        <span>鬼灭之刃</span>
                                        </a>
                                    <?php } ?>
                                    </div>
                                <?php } ?>
                            <!-- <a class="dm-tag dm-tag-a " href="/tag/358418?_source_page=detail" target="_blank" title=""><i type="original" style="margin-right:3px" class="iconfont icon-original"></i><span>鬼灭之刃</span></a><a class="dm-tag dm-tag-a " href="/tag/20659579?_source_page=detail" target="_blank" title=""><span>鬼灭之刃同人漫画评论</span></a><a class="dm-tag dm-tag-a " href="/tag/2857?_source_page=detail" target="_blank" title=""><span>漫画</span></a><a class="dm-tag dm-tag-a " href="/tag/18954?_source_page=detail" target="_blank" title=""><span>漫评</span></a><a class="dm-tag dm-tag-a " href="/tag/48220?_source_page=detail" target="_blank" title=""><span>评论</span></a><a class="dm-tag dm-tag-a " href="/tag/706645?_source_page=detail" target="_blank" title=""><span>漫画评论</span></a></div> -->
                        </header>
                        <div class="content">
                            <h1 class="title">7.2</h1>
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
                                        <textarea class="dm-textarea comment-input" on="input-throttled:AMP.setState({isActive:
                                            event.value.length > 0 ? false : true
                                        })"
                                        rows="4" placeholder="" style="overflow-x: hidden; overflow-wrap: break-word; height: 90px;"></textarea>
                                        <div class="test" style="font: 14px / 24px -apple-system, &quot;Helvetica Neue&quot;, &quot;PingFang SC&quot;, &quot;\\5FAE软雅黑&quot;, &quot;\\5B8B体&quot;, &quot;\\9ED1体&quot;, arial, sans-serif; border: 1px solid rgb(233, 233, 240); padding: 5px 10px; height: 90px; width: 830px;"></div>
                                </div>
                                <button class="dm-btn l-right dm-btn-primary dm-btn-size-default" [class]="isActive == true ? 'dm-btn l-right dm-btn-primary dm-btn-size-default dm-btn-disabled' : 'dm-btn l-right dm-btn-primary dm-btn-size-default' " style="font-size:18px;padding:0 15px" type="button" [disabled]="isActive"><span>评 论</span></button>
                            </form>
                        </div>
                        <div class="total-num">
                            <div class="total-num-block total-num-main"><?= $comments_count ?>&nbsp;Bình luận</div>
                            <!-- <div class="total-num-block total-num-tags"><span class="total-num-tag active">按热度顺序</span><span class="total-num-tag ">按发布顺序</span></div> -->
                        </div>
                        <div>
                            <?php foreach($commentDatas as $comment) { ?>
                                <div class="comment-item fade-enter-done overflow-hidden">
                                    <a class="name" target="_blank" rel="noopener noreferrer" href=""><?= $comment['coment']['comment_author_email'] ?></a>
                                    <div class="content">
                                        <p><?= $comment['coment']['comment_content'] ?></p>
                                        <div class="comment-images"></div>
                                    </div>
                                    <div class="time-operation">
                                        <span class="minor"><?= getTimeMessage($comment['coment']['comment_date']) ?></span>
                                        <span class="operation comment-operation" style="margin-right: 10px;">
                                            <!-- <a class="report">举报</a><a>回复</a><span class="break-line">|</span><a>
                                                赞 579
                                            </a> -->
                                        </span>
                                    </div>
                                    <div class="avatar-user" style="width: 50px; height: 50px; position: absolute; left: 0px; top: 15px;">
                                        <a class="user-link" href="/u/34837665155652?_source_page=detail" target="_blank" rel="noopener noreferrer" title="<?= $comment['coment']['comment_author'] ?>">
                                            <img src="<?php echo get_template_directory_uri(); ?>/everestthemes/assets/images/no-photo.jpg" alt="<?= $comment['coment']['comment_author'] ?>">
                                        </a>
                                    </div>
                                    <?php
                                    if (count($comment['child_comment']) > 0) { ?>
                                        <div class="subcomments-wrap" style="display: block;">
                                            <?php foreach($comment['child_comment'] as $childComment) { ?>
                                                <div class="subcomment-item">
                                                    <div class="flex-row-between">
                                                        <div><a class="name" target="_blank" rel="noopener noreferrer" href="/u/108010640975?_source_page=detail"><?= $childComment['comment_author_email'] ?></a>
                                                            <span class="minor"><?= getTimeMessage($childComment['comment_date']) ?></span>
                                                        </div>
                                                        <span class="operation subcomment-operation" style="margin-right: -5px;"></span>
                                                    </div>
                                                    <div class="content">
                                                        <p><?= $childComment['comment_content'] ?></p>
                                                        <div class="comment-images"></div>
                                                    </div>
                                                    <div class="avatar-user" style="width: 40px; height: 40px; position: absolute; left: 0px; top: 15px;"><a class="user-link" href="/u/108010640975?_source_page=detail" target="_blank" rel="noopener noreferrer" title="魏颜字沫雪"><img src="https://p9-bcy.byteimg.com/img/banciyuan/Public/Upload/avatar/108010640975/95438b1ab1da4567a7c7d608579785e5/fat.jpg~tplv-banciyuan-amiddle.image" alt="魏颜字沫雪"></a></div>
                                                </div>
                                            <?php } ?>
                                            <div>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <form action="" method="POST">
                                                <input type="hidden" name="">
                                                <div class="mentions">
                                                        <textarea class="dm-textarea comment-input" on="input-throttled:AMP.setState({isActive:
                                                            event.value.length > 0 ? false : true
                                                        })"
                                                        rows="4" placeholder="" style="overflow-x: hidden; overflow-wrap: break-word; height: 90px;"></textarea>
                                                        <div class="test" style="font: 14px / 24px -apple-system, &quot;Helvetica Neue&quot;, &quot;PingFang SC&quot;, &quot;\\5FAE软雅黑&quot;, &quot;\\5B8B体&quot;, &quot;\\9ED1体&quot;, arial, sans-serif; border: 1px solid rgb(233, 233, 240); padding: 5px 10px; height: 90px; width: 830px;"></div>
                                                </div>
                                                <button class="dm-btn l-right dm-btn-primary dm-btn-size-default mt-4" [class]="isActive == true ? 'dm-btn l-right dm-btn-primary dm-btn-size-default dm-btn-disabled mt-4' : 'dm-btn l-right dm-btn-primary dm-btn-size-default mt-4' " style="font-size:18px;padding:0 15px" type="button" [disabled]="isActive"><span>评 论</span></button>
                                            </form>
                                        </div>
                                    <?php }
                                    ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div>
                    <article class="detail-main bg-white">
                    121
                    </article>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- <script id="comments" target="amp-script" type="application/javascript">
        $(document).ready(function() {
            console.log(83);
            $('.comment-input').change(function() {
                console.log(83);
                if ($(this).val() == '') {
                    $('.dm-btn-primary').addClass('dm-btn-disabled');
                    $('.dm-btn-primary').attr('disabled', true);
                } else {
                    $('.dm-btn-primary').removeClass('dm-btn-disabled');
                    $('.dm-btn-primary').attr('disabled', false);
                }
            })
        })
    </script> -->

    <!-- <script id="myscript" type="text/plain" target="amp-script">
    </script> -->
    <!-- <amp-script layout="container" src="<?= get_template_directory_uri() . '/everestthemes/assets/dist/js/single.js' ?>"> -->
    <!-- </amp-script -->
<?php
get_footer();
