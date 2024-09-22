<h1>Список клієнтів</h1>
<table>
    <tr>
        <th>Ім'я</th>
        <th>Телефон</th>
        <th>Email</th>
        <th>Останній візит</th>
    </tr>
    @foreach ($clients as $client)
    <tr>
        <td>{{ $client->name }}</td>
        <td>{{ $client->phone }}</td>
        <td>{{ $client->email }}</td>
        <td>{{ $client->last_visit }}</td>
    </tr>
    @endforeach
</table>
