{foreach $comments as $comment}
    <li class="comment" data-comment-id="{$comment.id}">
        <div>
            <p>{$comment.text|escape}</p>
            <h5>
                <p class="author">
                    di @<a href="{$BASE_URL}/profile/{$comment.author->getUsername()}">
                        {$comment.author->getUsername()}
                    </a>
                </p>
            </h5>
        </div>
        
        {if $comment.canDelete}
            <form method="post"
                  action="{$BASE_URL}/commentDelete"
                  class="comment-delete-form">
                <input type="hidden" name="comment_id" value="{$comment.id}">
                <button type="submit"
                        class="button small danger icon solid fa-trash"
                        title="Elimina commento">
                </button>
            </form>
        {/if}
    </li>
{/foreach}