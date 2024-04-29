<x-app-layout>
  <div class="container h-100">
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <!-- 目標の追加用モーダル -->
    @include('modals.add_goal')

    <div class="d-flex mb-3">
      <a href="#" class="link-dark text-decoration-none" data-bs-toggle="modal" data-bs-target="#addGoalModal">
        <div class="d-flex align-items-center">
          <span class="fs-5 fw-bold">＋</span>&nbsp;目標の追加
        </div>
      </a>
    </div>

    <div class="row row-cols-1 row row-cols-md-2 row-cols-lg-3 g-4">
      @foreach ($goals as $goal)

      <!-- 目標の編集用モーダル -->
      @include('modals.edit_goal')

      <!-- 目標の削除用モーダル -->
      @include('modals.delete_goal')

      <div class="col">
        <div class="card bg-light">
          <div class="card-body d-flex justify-content-between align-items-center">
            <h4 class="card-title ms-1 mb-0">{{ $goal->title }}</h4>
            <div class="d-flex align-items-center">
              <div class="dropdown">
                <a href="#" class="dropdown-toggle px-1 fs-5 fw-bold link-dark text-decoration-none menu-icon" id="dropdownGoalMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">︙</a>
                <ul class="dropdown-menu dropdown-menu-end text-center" aria-labelledby="dropdownGoalMenuLink">
                  <li><a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editGoalModal{{ $goal->id }}">編集</a></li>
                  <div class="dropdown-divider"></div>
                  <li><a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteGoalModal{{ $goal->id }}">削除</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</x-app-layout>