@forelse($data['business_detail']->categories as $category)
    <a href="#">{{$category->name}}</a>
@empty
    <p>No Categories</p>

@endforelse