<h1>Ciao ristoratore, ti è arrivato un nuovo ordine, ecco i dati del cliente:</h1> <br>
<h3>Nome: {{$order->customer_name}}</h3> <br>
<h3>Email: {{$order->customer_email}}</h3> <br>
<h3>Indirizzo cliente: {{$order->customer_address}}</h3> <br>
<h3>Telefono cliente: {{$order->customer_phone}}</h3> <br>
<h3>Data ordine: {{$order->date}}</h3> <br>
<h3>Messaggio: {{$order->message}}</h3>

<h3>Prezzo totale: {{$order->price}}</h3>
