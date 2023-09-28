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

    <?= Form::open(['class' => 'layout']) ?>

        <div class="layout-row">
            <?= $this->formRender() ?>
        </div>

        <div class="form-buttons">
            <div class="loading-indicator-container">
                <button
                    type="submit"
                    data-request="onSave"
                    data-hotkey="ctrl+s, cmd+s"
                    data-load-indicator="<?= e(trans('backend::lang.form.creating_name', ['name'=>$formRecordName])) ?>"
                    class="btn btn-primary">
                    <?= e(trans('backend::lang.form.create')) ?>
                </button>
                <button
                    type="button"
                    data-request="onSave"
                    data-request-data="close:1"
                    data-hotkey="ctrl+enter, cmd+enter"
                    data-load-indicator="<?= e(trans('backend::lang.form.creating_name', ['name'=>$formRecordName])) ?>"
                    class="btn btn-default">
                    <?= e(trans('backend::lang.form.create_and_close')) ?>
                </button>
                <span class="btn-text">
<<<<<<< HEAD
                    <?= e(trans('backend::lang.form.or')) ?> <a href="<?= Backend::url('impelling/projects/tasks') ?>"><?= e(trans('backend::lang.form.cancel')) ?></a>
=======
                    <?= e(trans('backend::lang.form.or')) ?> <a href="<?= Backend::url('unspun/projects/tasks') ?>"><?= e(trans('backend::lang.form.cancel')) ?></a>
>>>>>>> add-access-tokens
                </span>
            </div>
        </div>

    <?= Form::close() ?>

<?php else: ?>

    <p class="flash-message static error"><?= e($this->fatalError) ?></p>
<<<<<<< HEAD
    <p><a href="<?= Backend::url('impelling/projects/tasks') ?>" class="btn btn-default"><?= e(trans('backend::lang.form.return_to_list')) ?></a></p>
=======
    <p><a href="<?= Backend::url('unspun/projects/tasks') ?>" class="btn btn-default"><?= e(trans('backend::lang.form.return_to_list')) ?></a></p>
>>>>>>> add-access-tokens

<?php endif ?>
