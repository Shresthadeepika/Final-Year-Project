<html>
<head>

</head>
<body>
    <div>
        <p>The vehicle you wished to rent have been approved. Below the rent details:</p>
        <p>Number plate: {{$vehicle->number_plate}}</p>
        <p>Price per day : {{$vehicle->price_per_day }} </p>
        <p>Company : {{$vehicle->company}} </p>
        <p>Model : {{$vehicle->model }} </p>
        <p>Year : {{$vehicle->year}} </p>
        <p>Total price : {{$rented->total_price}}</p>
        <p>Rented from : {{$rented->rented_date}}</p>
        <p> Thank u for renting vehicles</p>
    </div>
</body>
</html>