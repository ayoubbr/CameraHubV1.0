<x-app-layout>
    <x-slot name="header">
        <h2 class="page-title">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="content-wrapper">
        <div class="content-container">
            <div class="card" style="margin-bottom: 10px">
                <div class="card-body">
                    <x-validation-errors />
                    <x-success-message />
                    <form method="POST" action="{{ route('categories.store') }}">
                        @method('POST')
                        @csrf
                        <div class="form-grid-category">
                            <div class="form-column-category">
                                <div class="form-group">
                                    <x-label for="name" :value="__('Name')" />
                                    <x-input id="name" class="form-control" type="text" name="name"
                                        autofocus />
                                </div>
                                <div class="form-group">
                                    <x-label for="description" :value="__('Description')" />
                                    <x-input id="description" class="form-control" type="description" name="description"
                                        autofocus />
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <x-button class="btn-primary">
                                {{ __('Create') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
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
                                                    Description
                                                </th>
                                                <th scope="col" class="table-header-cell">
                                                    Created time
                                                </th>
                                                <th scope="col" class="table-header-cell">
                                                    Updated time
                                                </th>
                                                <th scope="col" class="table-header-cell-action">
                                                    <span class="sr-only">Edit</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-body">
                                            @foreach ($categories as $category)
                                                <tr>
                                                    <td class="table-cell">
                                                        {{ $category->name }}
                                                    </td>
                                                    <td class="table-cell">
                                                        {{ Str::of($category->description)->limit(40) }}
                                                    </td>
                                                    <td class="table-cell">
                                                        {{ $category->created_at }}
                                                    </td>
                                                    <td class="table-cell">
                                                        {{ $category->updated_at }}
                                                    </td>
                                                    <td class="table-cell-action">
                                                        {{-- <a href="{{ route('categories.edit', $category) }}"
                                                            class="edit-link">Edit</a> --}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="pagination-container">
                                    {{ $categories->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
