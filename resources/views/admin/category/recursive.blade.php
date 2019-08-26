<li>
    <a href="{{url('admin/category', $category->id)}}">{{$category->name}}</a>

    @if($category->child)
        <ul class="category-recursive-child nav navbar-nav">
            @each('admin.category.recursive', $category->child, 'category')
        </ul>
    @endif
</li>
