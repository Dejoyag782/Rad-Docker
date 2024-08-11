<div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-dark" style="color:#fed136;">
          <h5 class="modal-title" id="messageModalLabel"><b>Message Details</b></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <input type="hidden" name="id" id="id">            
            <p><b>From:</b></p>
            <p class="bg-dark" style="border-radius: 10px; color:white; padding:5px;"><i class="fa fa-user" style="padding-right:10px;"></i><span id="name"></span></p>
            
            <hr style="margin-top:20px; margin-bottom:20px;">

            <p><b>Contact:</b></p>
            <p><i class="fa fa-envelope" style="padding-right:10px;"></i><b>-</b> <span id="email"></span></p>
            <p><i class="fa fa-mobile" style="font-size: 20pt; padding-right:10px;"></i><b>-</b> <span id="phone"></span></p>
             
            <hr style="margin-top:20px; margin-bottom:20px;">
            
            <p><b>Description:</b></p>
            <p class="bg-dark" style="border-radius: 10px; color:white; padding:5px;"><span id="desc"></span></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>