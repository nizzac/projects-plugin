<?php Block::put('breadcrumb') ?>
    <ol class="breadcrumb">
<<<<<<< HEAD
        <li class="breadcrumb-item"><a href="<?= Backend::url('impelling/projects/tasks') ?>">Tasks</a></li>
=======
        <li class="breadcrumb-item"><a href="<?= Backend::url('unspun/projects/tasks') ?>">Tasks</a></li>
>>>>>>> add-access-tokens
        <li class="breadcrumb-item active" aria-current="page"><?= e($this->pageTitle) ?></li>
    </ol>
<?php Block::endPut() ?>

<?php if (!$this->fatalError): ?>

    <div class="form-preview">
        <?= $this->formRenderPreview() ?>
    </div>

<?php else: ?>

    <p class="flash-message static error"><?= e($this->fatalError) ?></p>
<<<<<<< HEAD
    <p><a href="<?= Backend::url('impelling/projects/tasks') ?>" class="btn btn-default"><?= e(trans('backend::lang.form.return_to_list')) ?></a></p>
=======
    <p><a href="<?= Backend::url('unspun/projects/tasks') ?>" class="btn btn-default"><?= e(trans('backend::lang.form.return_to_list')) ?></a></p>
>>>>>>> add-access-tokens

<?php endif ?>
