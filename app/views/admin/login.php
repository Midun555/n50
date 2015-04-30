<div class="container">

    <div class="page-header">
        <h1>Admin - Login</h1>
    </div>

    <div>
        <form action="/admin/login_process/" method="post">
            <div class="row">
                <div class="col-xs-12 col-sm-4">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" required class="form-control" autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" required class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Login</button>
        </form>
    </div>

</div>