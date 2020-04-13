<?php foreach ($data as $list) : ?>
    <tr>
        <td><?= $list->id ?></td>
        <td><?= $list->nama ?></td>
        <td><?= $list->username ?></td>
        <td><?= $list->role ?></td>
        <td>
            <a href="<?= base_url() . 'user/edit/' . $list->id; ?>" class="btn btn-info btn-outline-info modal-show edit" title="Edit <?= $list->nama; ?>">Edit</a>
            <a href="<?= base_url() . 'user/delete/' . $list->id; ?>" class="btn-delete btn btn-danger btn-outline-danger" title="<?= $list->nama; ?>">Delete</a>
        </td>
    </tr>
<?php endforeach ?>
