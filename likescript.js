$(document).ready(function(){

    //when the user clicks the like button of a post
    $('.like-btn').on('click', function(){
        var IdeaID = $(this).data('id');        
        $clicked_btn = $(this);

        // for the like button, u can only like or unlike. no dislike action.
        if ($clicked_btn.hasClass('bx-like')) {
            Action = 'like';
        } else if ($clicked_btn.hasClass('bxs-like')) {
            Action = 'unlike';
        }

        $.ajax({
            url: 'ideadetails.php',
            type: 'post',
            data: {
                'Action': Action,
                'IdeaID': IdeaID
            },
            success: function(data){
                res = JSON.parse(data);

                if (Action == 'like') {
                    $clicked_btn.removeClass('bx-like');
                    $clicked_btn.addClass('bxs-like');
                }else if (Action == 'unlike'){
                    $clicked_btn.removeClass('bxs-like');
                    $clicked_btn.addClass('bx-like');
                }

                //display number of likes and dislikes
                $clicked_btn.siblings('span.like_count').text(res.like_count);
                $clicked_btn.siblings('span.dislike_count').text(res.dislike_count);

                // if the user previously disliked this post, change dislike button styles accordingly
                $clicked_btn.siblings('i.bxs-dislike').removeClass('bxs-dislike').addClass('bx-dislike');
            }
        })
    });


    //when the user clicks the dislike button of a post
    $('.dislike-btn').on('click', function(){
        var IdeaID = $(this).data('id');      
        $clicked_btn = $(this);

        // for the like button, u can only dislike or undislike. no like action.
        if ($clicked_btn.hasClass('bx-dislike')) {
            Action = 'dislike';
        } else if ($clicked_btn.hasClass('bxs-dislike')) {
            Action = 'undislike';
        }

        $.ajax({
            url: 'ideadetails.php',
            type: 'post',
            data: {
                'Action': Action,
                'IdeaID': IdeaID
            },
            success: function(data){
                res = JSON.parse(data);

                if (Action == 'dislike') {
                    $clicked_btn.removeClass('bx-dislike');
                    $clicked_btn.addClass('bxs-dislike');
                }else if (Action == 'undislike'){
                    $clicked_btn.removeClass('bxs-dislike');
                    $clicked_btn.addClass('bx-dislike');
                }

                //display number of likes and dislikes
                $clicked_btn.siblings('span.like_count').text(res.like_count);
                $clicked_btn.siblings('span.dislike_count').text(res.dislike_count);

                // if the user previously liked this post, change like button styles accordingly
                $clicked_btn.siblings('i.bxs-like').removeClass('bxs-like').addClass('bx-like');
            }
        })
    });
});
