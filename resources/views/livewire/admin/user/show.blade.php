<x-show-user-info>
    <x-slot name='id'>showUser</x-slot>
    <x-slot name='title'>Përdoruesi</x-slot>
    <form action="">
        <input type="hidden" wire:model='ids'>
        <table class="table">
            <tr>
                <th scope="row">Foto</th>
                <td>
                    @if ($photo)
                        <img src="{{ asset('storage/' . $photo) }}" alt="{{ $name }}" width="100">
                    @else
                        <img src="{{ asset('storage/default.png') }}" alt="{{ $name }}" width="100">
                    @endif
                </td>
            </tr>

            <tr>
                <th scope="row">Statusi</th>
                <td>
                    @if (Cache::has('user-is-online-' . $ids))
                        <span class="badge badge-success">Online</span>
                    @else
                        <span class="badge badge-danger">Offilne </span><span>aktiviteti i fundit para:
                            {{ $last_seen }}</span>
                    @endif
                </td>
            </tr>

            <tr>
                <th scope="row">Emri</th>
                <td>{{ $name }}</td>
            </tr>

            <tr>
                <th scope="row">Mbiemri</th>
                <td>{{ $mbiemri }}</td>
            </tr>
            <tr>
                <th scope="row">Username</th>
                <td> @if ($username)  <a href="{{ route('user.show', ['user' => $username]) }}"> {{ $username }}</a> @endif </td>
            </tr>

            <tr>
                <th scope="row">Email</th>
                <td>{{ $email }}</td>
            </tr>

            <tr>
                <th scope="row">Rolet</th>
                <td>
                    @forelse ($selectRoles as $role)
                        {{ $role }}
                    @empty
                        User Normal
                    @endforelse
                </td>
            </tr>

            <tr>
                <th scope="row">Postimet</th>
                <td>{{ $postsCount }}</td>
            </tr>

            <tr>
                <th scope="row">Ndjekës</th>
                <td>{{ $followersCount }}</td>
            </tr>


            @if ($bio !== null)
                <p>{{ $bio }}</p>
            @endif

            @if ($url !== null)
                <a href="{{ $url }}">
                    <i style="color: #333" class="fab fa-github" aria-hidden="true"></i>
                </a>
            @endif

            @if ($github !== null)
                <a href="https://www.github.com/{{ $github }}">
                    <i style="color: #333" class="fab fa-github" aria-hidden="true"></i>
                </a>
            @endif

            @if ($linkedin !== null)
                <a href="https://www.linkedin.com/in/{{ $linkedin }}">
                    <i style="color: #0077b5" class="fab fa-linkedin" aria-hidden="true"></i>
                </a>
            @endif

            @if ($facebook !== null)
                <a href="https://www.facebook.com/{{ $facebook }}">
                    <i class="fab fa-facebook" aria-hidden="true"></i>
                </a>
            @endif

            @if ($instagram !== null)
                <a href="https://www.instagram.com/{{ $instagram }}">
                    <i style="color: #bc2a8d" class="fab fa-instagram" aria-hidden="true"></i>
                </a>
            @endif

            @if ($twitter !== null)
                <a href="https://twitter.com/{{ $twitter }}">
                    <i style="color: #00acee" class="fab fa-twitter" aria-hidden="true"></i>
                </a>
            @endif

            @if ($youtube !== null)
                <a href="https://www.youtube.com/channel/{{ $youtube }}">
                    <i style="color: #FF0000" class="fab fa-youtube" aria-hidden="true"></i>
                </a>
            @endif


            <tr>
                <th scope="row">U krija me </th>
                <td>
                    {{ strftime('%e %B, %Y', strtotime($created_at)) }}
                </td>
            </tr>

        </table>
    </form>
</x-show-user-info>
