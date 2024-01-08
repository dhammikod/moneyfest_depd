<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Manage Users</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-rbs5gXHStl/G4N8A+g6ZO5t3e8IIHzBRPAeXK2BCsDAa4x0aDlOmUkuF5ce2vmTx" crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <!-- Include DataTables CSS -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

        {{-- Include bootstrap js popper --}}
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
        </script>
        <!-- Include jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        {{-- Include Bootstrap --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>

        <!-- Include DataTables JS -->
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>
        <link rel="stylesheet" href="/assets/css/dashboard.css">
        <link rel="stylesheet" href="assets/css/dashboard2.css">
    </head>

    <body>
        <div class="container-fluid ">
            <div class="card w-100 h-100 mt-4 position-relative overflow-hidden">
                <div class="card-body" style="background-color: #CEDCEE">
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="btn btn-outline-primary mx-3 mt-2 d-block">
                            <a>Logout</a>
                        </button>
                    </form>
                    <div class="col-md-12">
                        <h5 class="card-title fw-semibold mb-4 text-center">Manage User</h5>
                        <div class="card table-responsive">
                            <div id="contacts" class="table-responsive">

                                <table class="table table-striped ">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="sort" data-sort="nama">Nama</th>
                                            <th scope="col" class="sort" data-sort="jenis">Email
                                            </th>
                                            <th scope="col" class="sort" data-sort="role">Role
                                            </th>
                                        
                                            <th colspan="2">
                                                Action
                                                {{-- <input type="text" class="search" placeholder="Search Items" /> --}}
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($users as $user)
                                            <tr>
                                                <td class="id" style="display:none;">
                                                    {{ $i }}
                                                </td>
                                                <td class="nama">{{ $user['name'] }}</td>
                                                <td class="jenis">{{ $user['email'] }}</td>
                                                <td class="jenis">{{ $user['role'] }}</td>
                                                <td class="remove"><button type="button" class="btn btn-danger"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal{{ $user['id'] }}">
                                                        Delete
                                                    </button></td>
                                            </tr>
                                            @php
                                                $i++;
                                            @endphp

                            

                                            {{-- Model Delete --}}
                                            {{-- Model Delete --}}
                                            {{-- Model Delete --}}
                                            <div class="modal fade" id="deleteModal{{ $user['id'] }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">

                                                <div class="modal-dialog">

                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <h2 style="font-weight: bold">Are you sure?
                                                            </h2>
                                                            <h5 style="font-weight: bold">Delete data</h2>
                                                                <form method="post" action=""
                                                                    style="text-align: center">
                                                                    @csrf
                                                                    <input type="hidden" name="delete" value="true">
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $user['id'] }}">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">
                                Add New User
                            </button>


                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true" style="text-align: center">>
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content text-center">
                                        <div class="modal-header text-center">
                                            <h3 style="font-weight: bold" class="modal-title text-center" id="staticBackdropLabel">
                                                Input New User</h3>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-center">

                                            <form method="post" action="" class="mb-3"
                                                style="text-align: center">

                                                @csrf

                                                <input type="hidden" name="create" value="true">
                                                

                                                <input type="text" class="form-control mb-2" name="name" id="name" placeholder="Nama Pengguna"
                                                    required style="border-color: #2F80ED; background-color: #E0E9F4">

                                        

                                                <input type="email" class="form-control mb-2" name="email" id="email" placeholder="Email Pengguna"
                                                    required style="border-color: #2F80ED; background-color: #E0E9F4">

                                            
                                                <input type="password" class="form-control mb-2" name="password" id="password" placeholder="Password"
                                                    required style="border-color: #2F80ED; background-color: #E0E9F4">

                                                <label for="role">Role:</label>
                                                <select name="role" required>
                                                    <option value="admin">admin</option>
                                                    <option value="member">member</option>
                                                </select>
                                                

                                        </div>
                                        <div class="modal-footer text-center">
                                            <button type="submit" class="btn btn-primary"
                                                style="padding: 8px 12px; border: none; border-radius: 4px; cursor: pointer; font-weight: bold">ADD USER</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
                        integrity="sha384-pzjw8H+Y6PKWSK1Xfplw3QyJc5vuyogFXmoMGTtL3eUnh2cZrsGDMi67q2I8A+b7" crossorigin="anonymous">
                    </script>
    </body>

    </html>
