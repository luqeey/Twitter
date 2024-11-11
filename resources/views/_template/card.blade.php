<div class="mt-3">
    <div class="card">
        <div class="px-3 pt-4 pb-2">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                         src="https://api.dicebear.com/6.x/fun-emoji/svg?seed={{$post->user->name}}" alt="{{$post->user->name}}">
                    <div>
                        <h5 class="card-title mb-0"><a href="#"> {{ $post->user->name }}
                            </a></h5>
                    </div>
                </div>
                <div>
                    <form action="{{ route('post.destroy', $post->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <p class="fs-6 fw-light text-muted">
                {{ $post->content }}
            </p>
            <div class="d-flex justify-content-between">
                <div>
                    <a href="#" class="fw-light nav-link fs-6">
                        <span class="fas fa-heart me-1"></span> {{ $post->likes }} likov
                    </a>
                </div>
                <div>
                    <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                        3-5-2023
                    </span>
                </div>
            </div>
            <div>
                <h3>
                    Comments:
                </h3>
            </div>
            @foreach($post->comments as $comment)
                <p>{{$comment->content}}</p>
            @endforeach
            <div>
                <button id="addCommentButton-{{ $post->id }}" class="btn btn-primary btn-sm" onclick="showCommentForm({{ $post->id }})">Add Comment</button>
            </div>
            <div id="commentForm-{{ $post->id }}" style="display:none;">
                <form action="{{ route('comment.store', $post->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <textarea name="content" class="form-control" rows="1"></textarea>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary btn-sm">Post Comment</button>
                    </div>
                </form>
            </div>
            <div>
                <button class="btn btn-secondary btn-sm" onclick="showUpdateForm({{ $post->id }})">Update post</button>
            </div>
            <div id="updateForm-{{ $post->id }}" style="display:none;">
                <form action="{{ route('post.update', $post->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('PUT')
                    <textarea name="content" class="form-control" rows="1">{{ $post->content }}</textarea>
                    <button type="submit" class="btn btn-primary btn-sm mt-2">Confirm</button>
                </form>
            </div>
            <div>
                <a href="{{ route('post.show', $post->id) }}" class="btn btn-info btn-sm mt-2">View Post</a>
            </div>
        </div>
    </div>
</div>

<script>
    function showUpdateForm(postId) {
        document.getElementById('updateForm-' + postId).style.display = 'block';
    }

    function showCommentForm(postId) {
        document.getElementById('commentForm-' + postId).style.display = 'block';
        document.getElementById('addCommentButton-' + postId).style.display = 'none';
    }
</script>
