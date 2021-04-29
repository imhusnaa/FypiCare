{{-- print all send from frontController to ApptMail --}}

Dear {{$mailData['name']}},
<p>Thank you for booking your appointment with iCare</p>
<p>The details of your appointment are below:</p>
Time & Date: {{$mailData['time']}}, {{$mailData['date']}}<br>
with: {{$mailData['counsellorName']}}<br>
