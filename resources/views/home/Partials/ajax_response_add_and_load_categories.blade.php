<span class="want-sell-text">Select Categories</span>
<span class="search-drop-down7 ">
							<select multiple id="business_categories_load" name="category_ids[]"
                                    onchange="getTagEditBusiness()"
                                    class="selection_box_business_tag">
                                {{--{{dd($data['individual_popular'])}}--}}
                                <option value="" disabled>Select Work</option>

                                @foreach($data['category'] as $key=>$professional)
                                    <option value="{{$professional->id}}"
                                            @if($data['business_detail']->categories()->where('category_id',$professional->id)->count()>0) selected @endif>{{$professional->name}}</option>
                                @endforeach

							</select>
						</span>


<span class="tast-title">Business Tags</span>
<span class="search-drop-down7">
						<select multiple name="tags[]" id="tags_business_load">

                            <option value="" disabled>Select Tag</option>
                            @foreach($data['business_detail']->tags as $tag)
                                <option value="{{$tag->id}}" selected >{{$tag->name}}</option>
                            @endforeach
						</select>
</span>



