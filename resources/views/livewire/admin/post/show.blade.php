<x-show-user-info>
    <x-slot name='id'>postShow</x-slot>
    <x-slot name='title'>Përdoruesi</x-slot>
    <form action="">
        <input type="hidden" wire:model='ids'>
        <table class="table">

            <tr>
                <th scope="row">Titulli</th>
                <td>{{ $title }}</td>
            </tr>

            <tr>
                <th scope="row">Përshkrimi</th>
                <td>{{ $body }}</td>
            </tr>

            <tr>
                <th scope="row">Kategorit</th>
                <td>
                    {{-- @forelse ($categorit as $category)
                    <span class="badge badge-primary">
                        {{ $category->category->category }}</span>
                @empty
                    Nuk Ka
                @endforelse --}}
                </td>
            </tr>

            <tr>
                <th scope="row">Shikimet</th>
                <td>{{ $views }}</td>
            </tr>

            <tr>
                <th scope="row">Pëlqimet</th>
                <td>{{ $likes }}</td>
            </tr>

            <tr>
                <th scope="row">Komentet</th>
                <td>{{ $comments }}</td>
            </tr>

            <tr>
                <th scope="row">U krija me </th>
                <td>
                    {{ strftime('%e %B, %Y', strtotime($created_at)) }}
                </td>
            </tr>

        </table>
    </form>
</x-show-user-info>
