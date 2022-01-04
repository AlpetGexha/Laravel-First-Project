<div>
    Emri : {{$user->emri}} <br>
    mbiemri : {{$user->mbiemri}}<br>
    username : {{$user->username }}<br>
    email : {{$user->email }}<br>
    created_at : {{$user->created_at->diffForHumans()}}<br>
    profile_photo_path : {{$user->profile_photo_path}}<br>
</div>