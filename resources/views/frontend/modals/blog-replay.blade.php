<!-- Modal -->
<div class="modal fade" id="blog_comment_replay" tabindex="-1" role="dialog" aria-labelledby="blog_comment_replay_title"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="blog_comment_replay_title">Blog Comment Replay</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-12">
                    <div class="comments-form">
                        <h2 class="mb-4">Replay Comment</h2>
                        <!-- Contact Form -->
                        <form class="form" method="post" action="{{ route('frontend.blog.comment.repay') }}">
                            @csrf
                            <div class="row">
                                <input type="hidden" name="blog_id" id="blog_id">
                                <input type="hidden" name="comment_id" id="comment_id">
                                <div class="col-12">
                                    <div class="form-group message">
                                        <textarea name="comment" rows="7" placeholder="Type Your Message Here"></textarea>
                                    </div>
                                    @error('comment')
                                        <span class="text-danger error-text">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="modal-footer">
                                    <div class="form-group button">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn primary"><i class="fa fa-send"></i>
                                            Comment</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--/ End Contact Form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
