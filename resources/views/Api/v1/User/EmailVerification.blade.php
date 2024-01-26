<div>
   Hi {{ $name }},

   To have an access to this site, please verify your email by clicking the button below. <br />
   <a href={{ route('verification', ['id' => $id] )}}><button>Verify Email</button></a>
    <br />
   Thank you
   <br />
   Best Regards,
   Findspot Team
</div>
