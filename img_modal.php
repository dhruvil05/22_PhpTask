

<!-- Button trigger modal -->

<style>
  .img{
    width: auto;
    
  }
</style>

<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title img-resposive" id="exampleModalLabel">Image</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      

      

       <img src="<?php echo 'image/' .$data['image']; ; ?>" alt="image" class="img">
      
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

