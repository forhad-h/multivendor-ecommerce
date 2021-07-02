@php($check_selected_id = isset($category) ? @$category->parent->id : old('parent_id'))

@if ($main_category->isMain())
    <option value="{{ $main_category->id }}" {{ $check_selected_id == $main_category->id ? 'selected' : '' }}>
        {{ $main_category->name }}
    </option>
@endif

@foreach($main_category->children as $child_category)
    @php($is_depth_three = $loop->depth == 3)
    <option title="{{ $is_depth_three ? 'Not support for this level nested category' : '' }}"
            {{ $is_depth_three ? 'disabled' : '' }}
            value="{{ $child_category->id }}" {{ $check_selected_id == $child_category->id ? 'selected' : '' }}>
        {!! str_repeat('&nbsp;', ($loop->depth-1)*6).$child_category->name !!}
    </option>

    @if (count($child_category->children))
        @include('admin.components.tree-categories', ['main_category' => $child_category])
    @endif
@endforeach
