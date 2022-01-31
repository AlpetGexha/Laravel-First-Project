@if ($user->hasRole('Super Admin'))
    <x-user-simbol-admin />
@endif

@if ($user->verified == 1)
    <x-user-simbol-check />
@endif
<style>
    svg {
        width: 15px;
    }

</style>
