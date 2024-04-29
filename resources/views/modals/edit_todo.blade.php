<div class="modal fade" id="editTodoModal{{ $todo->id }}" tabindex="-1" aria-labelledby="editTodoModalLabel{{ $todo->id }}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editTodoModalLabel{{ $todo->id }}">ToDoの編集</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
      </div>
      <form action="{{ route('goals.todos.update', [$goal, $todo]) }}" method="post">
        @csrf
        @method('patch')
        <div class="modal-body">
          <input type="text" class="form-control" name="content" value="{{ $todo->content }}">
          <div class="d-flex flex-wrap">
            @foreach ($tags as $tag)
            <label>
              <div class="d-flex align-items-center mt-3 me-3">
                @if ($todo->tags()->where('tag_id', $tag->id)->exists())
                <input type="checkbox" name="tag_ids[]" value="{{ $tag->id }}" checked>
                @else
                <input type="checkbox" name="tag_ids[]" value="{{ $tag->id }}">
                @endif
                <span class="badge bg-secondary ms-1 fw-light">{{ $tag->name }}</span>
              </div>
            </label>
            @endforeach
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">更新</button>
        </div>
      </form>
    </div>
  </div>
</div>