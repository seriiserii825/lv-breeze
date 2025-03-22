@props(['name', 'label' => null, 'categories' => [], 'currentCategoryId' => null])

@if ($label)
    <label for="{{ $name }}">{{ $label }}</label>
@endif
<select name="{{ $name }}" class="select_2">
    <option value="">Please Select</option>
    @foreach ($categories as $category)
        @if ($category->subcategories->isNotEmpty())
            <optgroup label="{{ $category->name }}">
                @foreach ($category->subcategories as $subcategory)
                    <option {{ old('category_id', $currentCategoryId) == $subcategory->id ? 'selected' : '' }}
                        value="{{ $subcategory->id }}">
                        {{ $subcategory->name }}
                    </option>
                @endforeach
            </optgroup>
        @endif
    @endforeach
</select>
<x-input-error :messages="$errors->get('category_id')" class="mt-2" />
