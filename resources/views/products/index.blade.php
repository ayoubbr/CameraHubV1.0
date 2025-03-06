<x-app-layout>
    <x-slot name="header">
        <h2 class="page-title">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="content-wrapper">
        <div class="content-container">
            <div class="card" style="margin-bottom: 10px">
                <div class="card-body">
                    <x-validation-errors />
                    <x-success-message />
                    <form method="POST" action="{{ route('products.store') }}">
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
                           
                            <div class="form-column-category">
                                <div class="form-group">
                                    <x-label for="unit" :value="__('Unit')" />
                                    <x-input id="unit" class="form-control" type="text" name="unit"
                                        autofocus />
                                </div>
                                <div class="form-group">
                                    <x-label for="price" :value="__('Price')" />
                                    <x-input id="price" class="form-control" type="number" name="price"
                                        autofocus />
                                </div>
                                <div class="form-group">
                                    <x-label for="stock" :value="__('Stock')" />
                                    <x-input id="stock" class="form-control" type="number" name="stock"
                                        autofocus />
                                </div>
                                <div class="form-group">
                                    <x-label for="image" :value="__('Product Image url')" />
                                    <x-input id="image" class="form-control" type="text" name="image"
                                        autofocus />
                                </div>
                                 {{-- <div class="form-group">
                                    <x-label for="category_name" :value="__('Category')" />
                                    <x-select id="category_name" name="category_name">
                                        <option value="" selected disabled hidden>
                                            {{ __('Choose a Category') }}
                                        </option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                                        @endforeach
                                    </x-select>
                                </div> --}}
                                <div class="form-group">
                                    <x-label for="subcategory_name" :value="__('Sub Category')" />
                                    <x-select id="subcategory_name" name="subcategory_name">
                                        <option value="" selected disabled hidden>
                                            {{ __('Choose a Sub Category') }}
                                        </option>
                                        @foreach ($subCategories as $subCategory)
                                            <option value="{{ $subCategory->name }}">{{ $subCategory->name }}</option>
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
                                                    Unit
                                                </th>
                                                <th scope="col" class="table-header-cell">
                                                    Price
                                                </th>
                                                <th scope="col" class="table-header-cell">
                                                    Stock
                                                </th>
                                                <th scope="col" class="table-header-cell">
                                                    Sub Category
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
                                                    <span class="sr-only">Action</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-body">
                                            @foreach ($products as $product)
                                                <tr>
                                                    <td class="table-cell">
                                                        {{ $product->name }}
                                                    </td>
                                                    <td class="table-cell">
                                                        {{ Str::of($product->description)->limit(40) }}
                                                    </td>
                                                    <td class="table-cell">
                                                        {{ $product->unit }}
                                                    </td>
                                                    <td class="table-cell">
                                                        {{ $product->price }}
                                                    </td>
                                                    <td class="table-cell">
                                                        {{ $product->stock }}
                                                    </td>
                                                    <td class="table-cell">
                                                        {{ $product->subcategory->name  }}
                                                    </td>
                                                    <td class="table-cell">
                                                        {{ $product->subcategory->category->name }}
                                                    </td>
                                                    <td class="table-cell">
                                                        {{ $product->created_at }}
                                                    </td>
                                                    <td class="table-cell">
                                                        {{ $product->updated_at }}
                                                    </td>
                                                    <td class="table-cell-action">
                                                        {{-- <a href="{{ route('categories.edit', $product) }}"
                                                            class="edit-link">Edit</a> --}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="pagination-container">
                                    {{-- {{ $products->links() }} --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
