<div class="modal" id="addon-popup-{{$addonFeature->id}}"
     role="dialog"
     style="background: rgba(0,0,0,.9);">
 <div class="modal-dialog" role="document">
  <div class="modal-content">
   <div class="modal-header">
    <h5 class="modal-title">Add On Features <label
             class="badge badge-info">
      <small> Total
       Price:{{$addonFeature->total_price}}</small>
     </label></h5>
    <button type="button" class="close"
            data-dismiss="modal"
            aria-label="Close">
     <span aria-hidden="true">&times;</span>
    </button>
   </div>
   <div class="modal-body">
    <div class="col-12 col-lg-8">
     @if($addonFeature->price_model_id == 1)

      @foreach($addonFeature->addonFeatures as $addonFeatured)
       <div class="row">
        <div class="col-6"><span
                 class="customer-id2">Feature Name</span>
        </div>
        <div class="col-6"><span
                 class="custom-right-text2">{{$addonFeatured->site->name}}</span>
        </div>
        <div class="col-6"><span
                 class="customer-id2">Feature Price</span>
        </div>
        <div class="col-6"><span
                 class="custom-right-text2">{{$addonFeatured->price}}</span>
        </div>
        <div class="col-6"><span
                 class="customer-id2">Feature Quantity</span>
        </div>
        <div class="col-6"><span
                 class="custom-right-text2">{{$addonFeatured->quantity}}</span>
        </div>
       </div>
       <hr>
      @endforeach
     @else

      @foreach($addonFeature->addonFeatures as $addonFeatured)


       <div class="row"
            style="padding:10px;    background: #dae0ea;margin-top:10px;">

        <div class="col-6"><span
                 class="customer-id2">Feature Name</span>
        </div>
        <div class="col-6">
                                                                                    <span class="custom-right-text2"><label
                                                                                             style="font-weight:bold;">{{$addonFeatured->site->name}}</label></span>
        </div>
        <div class="col-12"
             style="margin-bottom:10px;border-bottom:1px solid #bac0ca"></div>
        @foreach($addonFeatured->unit as $unit)


         <div class="col-6"><span
                  class="customer-id2">Price According to Unit</span>
         </div>
         <div class="col-6">
          <span class="custom-right-text2">{{$unit->price}}</span>
         </div>
         <div class="col-6">
          <span class="customer-id2">Feature Quantity</span>
         </div>
         <div class="col-6">
                                                                                    <span class="custom-right-text2">
                                                                                        @if($loop->index == 0) 1
                                                                                     to {{$unit->qty}}
                                                                                     @else {{$addonFeatured->unit[$loop->index-1]->qty+1}}
                                                                                     to {{$unit->qty}}
                                                                                     @endif
                                                                                    </span>
         </div>

        @endforeach
       </div>
      @endforeach
     @endif
    </div>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-secondary"
            data-dismiss="modal">Close
    </button>
   </div>
  </div>
 </div>
</div>