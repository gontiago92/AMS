<h1><?= $pageTitle ?></h1>

<div class="card bg-light mb-3">
    <div class="card-header navbar-expand-lg">
        <button class="btn btn-primary">Add</button>
    </div>
    <div class="card-body p-0">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Company</th>
                <th scope="col">Email</th>
                <th scope="col">Mobile</th>
                <th scope="col">Language</th>
                <th scope="col">Check-ins</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($visitors as $visitor): ?>
                <tr>
                    <td><a href="#"><?= $visitor->last_name . " " . $visitor->first_name ?></a></td>
                    <td><?= $visitor->company ?></td>
                    <td><?= $visitor->email ?></td>
                    <td><?= $visitor->company ?></td>
                    <td><?= $visitor->company ?></td>
                    <td><?= $visitor->company ?></td>
                    <td>
                        <button class="btn btn-warning btn-sm mr-2 text-white">Expect</button>
                        <button class="btn btn-primary btn-sm">Edit</button>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>