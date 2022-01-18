<li class="nav-item menu-open">
    <a href="#" class="nav-link active">
        <i class="nav-icon {{ $icone }}"></i>
        <p>
            {{ $name }}
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        {{ $slot }}
    </ul>
</li>
