<div class="d-flex align-self-center shadow  user_search">
    <div id="myDropdown" class="dropdown-content show">
        <input class="form-control" wire:model='user_search' type="search" autocomplete="no"
            placeholder="Kerkoni përdorues" id="myInput">
        @if ($user_search != null)
            @forelse ($user_results as $user_result)
                <a href="{{ route('user.show', ['user' => $user_result->username]) }}">
                    <div class="row">
                        <div class="col-md-3">
                            <img class="rounded-circle" width="32" height="32"
                                src="{{ $user_result->profile_photo_url }}" alt="{{ $user_result->username }}">
                        </div>
                        <div class="col-md-9">
                            {{ $user_result->username }}
                        </div>
                    </div>
                </a>
            @empty
                <span class="text-center" style="color: var(--bg-danger)"> Nuk ka Përdorues me këtë username</span>
            @endforelse
        @endif
    </div>
</div>
