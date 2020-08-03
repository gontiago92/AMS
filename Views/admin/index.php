<table class="dashTable">
    <caption><?= $pageTitle ?></caption>
    <thead>
    <tr>
        <th>IMAGE</th>
        <th>Post</th>
        <th>Author</th>
        <th>Categories</th>
        <th>Date</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($posts as $post): ?>
        <tr>
            <td><img src="https://picsum.photos/id/<?= $post->id ?>/200/100" alt="Article {{ article.id }}"></td>
            <td><a href="post/show/<?= $post->id ?>"><?= $post->title ?></a></td>
            <td>admin</td>
            <td>{{ article.categorie }}</td>
            <td><?php echo \App::timeago($post->created_at, "pt") ?></td>
            <td class="buttonContainer"><a href="admin/edit/<?= $post->id ?>" class="btn warning"><i class="fa fa-pen"></i></a></td>
            <td class="buttonContainer"><a href="dashboard/delete/{{ article.id }}" class="btn danger"><i class="fa fa-trash"></i></a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>