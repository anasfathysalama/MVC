<h1 style="text-align: center;"> Register </h1>

<form action="/register" method="post">
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1">First Name</label>
                <input type="text" name="first_name" class="form-control">
            </div>
        </div>
        <div class="col">

            <div class="form-group">
                <label for="exampleInputEmail1">Last Name</label>
                <input type="text" name="last_name" class="form-control">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" class="form-control" name="email">
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
        </div>
        <div class="col">

            <div class="form-group">
                <label for="exampleInputEmail1">Confirm Password</label>
                <input type="password" class="form-control" name="confirm_password">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
