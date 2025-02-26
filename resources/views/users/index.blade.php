<x-app-layout>
    <x-slot name="header">
        <h2 class="page-title">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="content-wrapper">
        <div class="content-container">
            <div class="content-card">
                <div class="card-body">
                    <div class="table-container">
                        <div class="table-wrapper">
                            <div class="table-responsive">
                                <div class="table-box">
                                    <table class="data-table">
                                        <thead class="table-header">
                                            <tr>
                                                <th scope="col" class="table-header-cell">
                                                    Name
                                                </th>
                                                <th scope="col" class="table-header-cell">
                                                    Email
                                                </th>
                                                <th scope="col" class="table-header-cell">
                                                    Joined
                                                </th>
                                                <th scope="col" class="table-header-cell">
                                                    Updated
                                                </th>
                                                <th scope="col" class="table-header-cell">
                                                    Role
                                                </th>
                                                <th scope="col" class="table-header-cell-action">
                                                    <span class="sr-only">Edit</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-body">
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td class="table-cell">
                                                        {{ $user->name }}
                                                    </td>
                                                    <td class="table-cell">
                                                        {{ $user->email }}
                                                    </td>
                                                    <td class="table-cell">
                                                        {{ $user->created_at }}
                                                    </td>
                                                    <td class="table-cell">
                                                        {{ $user->updated_at }}
                                                    </td>
                                                    <td class="table-cell">
                                                        @if (auth()->user()->roles->pluck('name')[0] ?? '' === 'customer')
                                                            {{ auth()->user()->name }}
                                                        @endif
                                                    </td>
                                                    <td class="table-cell-action">
                                                        <a href="{{ route('users.edit', $user) }}"
                                                            class="edit-link">Edit</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="pagination-container">
                                    {{ $users->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
