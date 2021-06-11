<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Interaction Platform V2</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
        <style>
            html,
            body {
                font-family: 'Open Sans', sans-serif;
                color: #333;
                scroll-behavior: smooth;
            }
            body {
                background-color: rgba(0,0,0,0.15);
            }
            .container {
                width: 100%;
                max-width: 768px;
                margin: 0 auto;
                padding: 0 1rem;
            }

            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
                text-align: left;
            }
            table {
                margin-bottom: 1rem;
            }
            th,td {
                padding: 0.33rem;
            }

            th {
                border-bottom: 4px solid black;
            }

            td:nth-child(1) {
                width: 220px;
            }
            td:nth-child(2) {
                width: 60px;
            }
            td:nth-child(3) {
                width: 160px;
            }
            td:nth-child(4) {
                width: 240px;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="container">
            <h1>Interaction Platform API V2</h1>
            <p>API Documentation for Interaction Platform version 2.</p>
            <hr>
            <h2>Table of contents</h2>
            <ul>
                <li>
                    <a href="#endpoints">Endpoints</a>
                </li>
                <li>
                    <a href="#authentication">Authentication</a>
                </li>
                <li>
                    <a href="#roles-and-permissions">Roles & Permissions</a>
                    <ul>
                        <li><a href="#roles">Roles</a></li>
                        <li><a href="#permissions">Permissions</a></li>
                    </ul>
                </li>
            </ul>
            <h2 id="endpoints"># List of endpoints</h2>
            <table>
                <tr>
                    <th>Description</th>
                    <th>Method</th>
                    <th>Endpoint</th>
                    <th>Parameters</th>
                </tr>
                <tr>
                    <td>Log in</td>
                    <td>POST</td>
                    <td><a href="/v2/users">/v2/login</a></td>
                    <td>email / password</td>
                </tr>
                <tr>
                    <td>Log out</td>
                    <td>POST</td>
                    <td><a href="/v2/users">/v2/logout</a></td>
                    <td>-</td>
                </tr>
            </table>
            <table>
                <tr>
                    <td>List all locations</td>
                    <td>GET</td>
                    <td><a href="/v2/locations">/v2/locations</a></td>
                    <td>-</td>
                </tr>
                <tr>
                    <td>Add new location</td>
                    <td>POST</td>
                    <td><a href="/v2/location/add">/v2/locations/add</a></td>
                    <td>-</td>
                </tr>
            </table>
            <h2 id="authentication"># Authentication</h2>
            <p>Authentication is done through Laravel Sanctum and tokens. A log in request with email and password 
                generates an API token which will be stored in the users browser.</p>
            
            <h2 id="roles-and-permissions"># Roles & Permissions</h2>
            <p>We use the Spatie Roles and Permissions package to manage roles and permissions. The documentation can be found <a href="https://spatie.be/docs/laravel-permission/" target="blank">here</a>.</p>
            <h3 id="roles"># Roles</h3>
            <p>There are three roles defined, and each have specific permissions. This is binded to a <code>User</code></p>
            <ul>
                <li>Administrator</li>
                <li>Manager</li>
                <li>Employee</li>
            </ul>
            <h3 id="permissions"># Permission</h3>
            <p>We have the following permissions implemented, this is binded to a <code>Role</code></p>
            <h4>Location based permissions</h4>
            <ul>
                <li>View location - <code> $user->can('view location'); </code></li>
                <li>Add location - <code> $user->can('add location'); </code></li>
                <li>Update location - <code> $user->can('update location'); </code></li>
                <li>Delete location - <code> $user->can('delete location'); </code></li>
            </ul>
            <h4>Device based permissions</h4>
            <ul>
                <li>View device - <code> $user->can('view device'); </code></li>
                <li>Add device - <code> $user->can('add device'); </code></li>
                <li>Update device - <code> $user->can('update device'); </code></li>
                <li>Delete device - <code> $user->can('delete device'); </code></li>
            </ul>
        </div>
    </body>
</html>
