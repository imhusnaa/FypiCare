<div class="communicationmessage-wrapper">
    <ul class="communicationmessages">


     @foreach($communicationmessages as $communicationmessage)
        
     <li class="communicationmessage clearfix">


        <div class="{{ ($communicationmessage->sender == Auth::id()) ? 'messagesent' : 'messagereceived' }}">
         
        
          <p>{{ $communicationmessage->communicationmessage }}</p>


          <p class="messagedata">{{ date('d M y, h:i a', strtotime($communicationmessage->created_at)) }}</p>
        </div>


     </li>


     @endforeach



    </ul>

   </div>


   <div class="input-text">
     
     <input type="text" name="typemessage" class="submit" placeholder="Type your message here...">

   </div>
