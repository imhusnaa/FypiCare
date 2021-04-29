@if(count($bookings)>0)
<!-- Modal -->
<div class="modal fade" id="exampleModal{{$booking->user_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form action="{{route('report')}}"  method="post">@csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Report</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="app">

        <input type="hidden" name="user_id" value="{{$booking->user_id}}">
        <input type="hidden" name="counsellor_id" value="{{$booking->counsellor_id}}">
        <input type="hidden" name="date" value="{{$booking->date}}">
        
        
          <div class="form-group">
            <label>Report</label>
            
            <textarea name="feedback" class="form-control" placeholder="report" required=""></textarea>


        </div>
        <div class="form-group">
            <label>Signature</label>
            <input type="text" name="signature" class="form-control" required="">
        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" style="background-color:#4CAF50;">Save changes</button>
      </div>
    </div>
  </form>
  </div>
</div>
@endif