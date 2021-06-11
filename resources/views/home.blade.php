<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Interaction Platform V2</title>
        <style>
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
                text-align: left;
            }
            th,td {
                padding: 0.25rem;
            }
        </style>
    </head>
    <body class="antialiased">
        <h1>Interaction Platform API V2</h1>
        <p>List of endpoints</p>
        <table>
            <tr>
                <th>Description</th>
                <th>Method</th>
                <th>Endpoint</th>
            </tr>
            <tr>
                <td>List all users</td>
                <td>GET</td>
                <td><a href="/v2/users">/v2/users</a></td>
            </tr>
            <tr>
                <td>Add new user</td>
                <td>POST</td>
                <td><a href="/v2/users">/v2/users/add</a></td>
              </tr>
          </table>
    </body>
</html>
