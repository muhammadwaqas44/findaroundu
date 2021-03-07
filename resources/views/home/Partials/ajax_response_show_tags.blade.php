@forelse($data['business_detail']->tags as $tag)
    <a href="#">{{$tag->name}}</a>
@empty
    <p>No Tags</p>

@endforelse