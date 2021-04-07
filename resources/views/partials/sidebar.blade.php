<div class="p-3 bg-white" style="width: 200px;">
    <a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
        <span class="fs-5 fw-semibold"> {{ config('app.name', 'Laravel') }}</span>
    </a>
    <ul class="list-unstyled ps-0">
        <li class="mb-1">
            <a href="{{ route('post.index') }}" class="btn btn-toggle"> Noticias</a>
            {{-- <button class="btn btn-toggle">Noticias</button> --}}
        </li>
        <li class="mb-1">
            <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                data-bs-target="#managent-collapse" aria-expanded="false">
                {{ __('Gerenciamento') }}
            </button>
            <div class="collapse ms-4" id="managent-collapse" style="">
                <ul class="btn-toggle list-unstyled fw-normal pb-1 ">
                    @can('user-list', User::class)
                        <li><a href="{{ route('user.index') }}" class=" link-dark rounded
                                    text-decoration-none">Usuários</a></li>
                    @endcan
                    @can('role-list', Role::class)
                        <li><a href="{{ route('role.index') }}"
                                class="link-dark rounded text-decoration-none">Atribuições</a></li>
                    @endcan
                    @can('permission-list', Permission::class)
                        <li><a href="{{ route('permission.index') }}"
                                class="link-dark rounded text-decoration-none">Permissões</a></li>
                    @endcan

                </ul>
            </div>
        </li>
    </ul>
</div>
