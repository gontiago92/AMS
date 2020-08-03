<h1><?= $pageTitle ?></h1>

<div class="card bg-light mb-3">
    <div class="card-header d-flex justify-content-between">
        <button class="btn btn-primary">Add</button>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <!--<button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>-->
        </form>
    </div>
    <div class="card-body p-0">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Mobile</th>
                <th scope="col">Language</th>
                <th scope="col">Notifications</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($employees as $employee): ?>
                <tr>
                    <td>
                        <a href="#" data-toggle="modal" data-target="#exampleModal-<?= $employee->emp_id ?>"><?= $employee->last_name . " " . $employee->first_name ?></a>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal-<?= $employee->emp_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><?= $employee->last_name . " " . $employee->first_name . "'s profile"?> </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-4">
                                                <?php $gender = (($employee->gender == 'Male') ? 'men' : 'women'); ?>
                                                <img src="https://randomuser.me/api/portraits/<?= $gender ?>/<?= $employee->emp_id ?>.jpg" alt="..." class="img-thumbnail">
                                            </div>
                                            <div class="col-8">
                                                <h3>Profile description</h3>
                                                <dl class="row">
                                                    <dt class="col-sm-3">Name</dt>
                                                    <dd class="col-sm-9"><?= $employee->last_name . " " . $employee->first_name ?></dd>

                                                    <dt class="col-sm-3">Email</dt>
                                                    <dd class="col-sm-9"><?= $employee->email ?></dd>

                                                    <dt class="col-sm-3">Hired on</dt>
                                                    <dd class="col-sm-9"><?= date('jS F Y', strtotime($employee->hire_date)) ?></dd>
                                                </dl>
                                            </div>
                                        </div>
                                        <!-- edit form <form method="POST">
                                            <div class="form-group row">
                                                <div class="col-6">
                                                    <label for="last_name">Lastname</label>
                                                    <input type="text" name="lastname" id="last_name" class="form-control" placeholder="Lastname">
                                                </div>
                                                <div class="col-6">
                                                    <label for="first_name">Firstname</label>
                                                    <input type="text" name="firstname" id="first_name" class="form-control" placeholder="Enter your Firstname" value="<?= (isset($_POST['firstname']) ? $_POST['firstname'] : ''); ?>">
                                                </div>
                                            </div>
                                        </form>-->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td><?= $employee->email ?></td>
                    <td>{{Mobile}}</td>
                    <td>{{Language}}</td>
                    <td>{{Email*SMS}}</td>
                    <td><button class="btn btn-primary btn-sm">Edit</button></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>