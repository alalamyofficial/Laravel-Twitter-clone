<div class="mr-3 mb-4">
        

    <div class="container">
        <div class="row">
            @foreach($mytweet as $tweet)
              <div class="col-md-4 mb-2">

                    <img src="{{asset($tweet->image)}}" alt="" class="img-thumbnail" 
                    style="  
                            width: 400px;
                            height: 100px;
                        "
                    data-toggle="modal" data-target="#fullImage"    
                    >
              
              </div>
            @endforeach
        </div>
    </div>

    
</div>



<!-- Modal -->
<div class="modal fade" id="fullImage" tabindex="-1" role="dialog" aria-labelledby="fullImageLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="fullImageLabel">Image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @foreach($mytweet as $tweet)

      <div class="modal-body">
    
          <img src="{{asset($tweet->image)}}" alt="" class="img-thumbnail">

      </div>
      @endforeach

    </div>
  </div>
</div>