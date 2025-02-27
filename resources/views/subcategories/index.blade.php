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
                    <form method="POST" action="{{ route('subcategories.store') }}">
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
                                <div class="form-group">
                                    <x-label for="category_name" :value="__('Category')" />
                                    <x-select id="category_name" name="category_name">
                                        <option value="" selected disabled hidden>{{ __('Choose a Category') }}
                                        </option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                                        @endforeach
                                    </x-select>
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
                                                    Category
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
                                            @foreach ($subCategories as $subCategory)
                                                <tr>
                                                    <td class="table-cell">
                                                        {{ $subCategory->name }}
                                                    </td>
                                                    <td class="table-cell">
                                                        {{ Str::of($subCategory->description)->limit(40) }}
                                                    </td>
                                                    <td class="table-cell">
                                                        {{ $subCategory->category->name }}
                                                    </td>
                                                    <td class="table-cell">
                                                        {{ $subCategory->created_at }}
                                                    </td>
                                                    <td class="table-cell">
                                                        {{ $subCategory->updated_at }}
                                                    </td>
                                                    <td class="table-cell-action">
                                                        {{-- <a href="{{ route('categories.edit', $subCategory) }}"
                                                            class="edit-link">Edit</a> --}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="pagination-container">
                                    {{ $subCategories->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
