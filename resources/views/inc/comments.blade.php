@if(count($comments) > 0)
@foreach($comments as $comment)
<li class="comment mb-3">
    <div class="comment-body flex justify-content-between">
        <figure class="comment-author-avatar" @if($comment->parent_id != null) style="margin-left:0px;" @endif>
            <img @if($comment->parent_id != null) src="{{asset('images/yt-subscribe.png')}}" @else src="{{asset('images/user-1.jpg')}}" @endif alt="user">
        </figure><!-- .comment-author-avatar -->

        <div class="comment-wrap">
            <div class="comment-author flex flex-wrap align-items-center">
                <span class="fn">
                    <a href="#">{{$comment->name}}</a>
                </span><!-- .fn -->

                <span class="comment-meta">
                    <a href="#">{{$comment->created_at}}</a>
                </span><!-- .comment-meta -->

                <div class="reply">
                    <a href="" id="reply">@if($comment->parent_id == null) Reply @endif</a>
                </div><!-- .reply -->
            </div><!-- .comment-author -->

            <p>{{$comment->message}}</p>

            @if(!Auth::guest())
            <div class="comments-form" id="replyform">
                <div class="comment-respond">
                    <!-- <h3 class="comment-reply-title">Leave a reply</h3> -->

                    <form class="comment-form" action="{{ route('comments.store') }}">
                        <input type="hidden" name="post_id" value="{{$post_id}}">
                        <input type="hidden" name="parent_id" value="{{$comment->id}}">
                        <input type="hidden" name="name" value="{{Auth::user()->name}}">
                        <input type="hidden" name="email" value="{{Auth::user()->email}}">
                        <textarea name="message" rows="18" cols="6" placeholder="Messages"></textarea>
                        <input type="submit" value="Reply">
                    </form><!-- .comment-form -->
                </div><!-- .comment-respond -->
            </div><!-- .comments-form -->
            @endif
            <ol class="comment-list">
            @include('inc.comments', ['comments' => $comment->replies])
            </ol>
            

        </div><!-- .comment-wrap -->
    </div><!-- .comment-body -->
</li><!-- .comment -->
@endforeach
@endif


