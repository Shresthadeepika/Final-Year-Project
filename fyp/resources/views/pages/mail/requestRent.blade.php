<html>
<head>

</head>
<body>
    <div>
        <p>User wants to rent the vehicle you listed out. Below are the vehicle details and the renting details. </p>
        <p>Number plate: {{$vehicle->number_plate}}</p>
        <p>Price per day : {{$vehicle->price_per_day }} </p>
        <p> Below are the details of the user who wants to rent it</p>
        <p>Name : {{$user->name}}</p>
        <p>Address : {{$user->address}}</p>
        <p>Gender : {{$user->gender}}</p>
        <p>Contact num : {{$user->contact_num}}</p>
        <p> Please login to check the rent request.</p>
        {{-- @component('mail::button', ['url' => 'user/show/rent/requests', 'color' => 'success'])
            View Request
        @endcomponent --}}
    </div>
</body>
</html>