<?php
$this->assign('title', h($doc->title));

$this->start('breadcrumbs');
$breadcrumbs = [
    ['title' => __d('panel', 'Documents'), 'url' => ['controller' => 'Docs', 'action' => 'index']],
    ['title' => h($doc->title)]
];
echo $this->element('breadcrumbs', ['breadcrumbs' => $breadcrumbs]);
$this->end();

$this->start('navigation');
$menu['docs'][1] = true;
echo $this->element('navigation', ['menu' => $menu]);
$this->end();

echo $this->Html->css('formplugins/summernote/summernote', ['block' => true]);

echo $this->Html->script(
    [
        '/vendor/bundle.umd.min',
        'formplugins/summernote/summernote'
    ],
    ['block' => true]
);
?>

<?php $this->start('script-code'); ?>
<script>
$(document).ready(function() {
    $('#title').on('input', function() {
        var text = $(this).val();
        var msg = slugify(text);
        $("#slug").val(msg);
    });

    $('.summernote').summernote(
        {
            height: '200px',
            tabsize: 2,
            dialogsFade: true,
            toolbar: [
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
                ['table', ['table']],
                ['insert', ['link', 'picture']],
                ['view', ['fullscreen', 'codeview']]
            ]
        }
    );
});
</script>
<?php $this->end(); ?>

<?= $this->Form->create($doc, ['type' => 'file']) ?>
<div class="row">
    <div class="col-md-9">
        <div id="panel-1" class="panel">
            <div class="panel-container show">
                <div class="panel-content">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#tab_en" role="tab">English</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab_ru" role="tab">Русский</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab_uz" role="tab">O'zbek</a></li>
                    </ul>
                    <div class="tab-content p-3 border border-top-0">
                        <div class="tab-pane fade show active" id="tab_en" role="tabpanel">
                            <?php
                            echo $this->Form->control('title', [
                                'label' => ['class' => 'sr-only'],
                                'class' => 'form-control input-lg form-control-lg rounded-0 border-top-0 border-left-0 border-right-0 px-0',
                                'placeholder' => __d('panel', 'Title')
                            ]);

                            echo $this->Form->control('slug', [
                                'label' => ['class' => 'sr-only'],
                                'placeholder' => __d('panel', 'Slug')
                            ]);

                            echo $this->Form->control('body', [
                                'label' => ['class' => 'sr-only'],
                                'class' => 'summernote',
                                'placeholder' => __d('panel', 'Body')
                            ]);
                            ?>
                        </div>
                        <div class="tab-pane fade" id="tab_ru" role="tabpanel">
                            <?php
                            echo $this->Form->control('_translations.ru.title', [
                                'label' => ['class' => 'sr-only'],
                                'class' => 'form-control input-lg form-control-lg rounded-0 border-top-0 border-left-0 border-right-0 px-0',
                                'placeholder' => __d('panel', 'Title')
                            ]);

                            echo $this->Form->control('_translations.ru.body', [
                                'label' => ['class' => 'sr-only'],
                                'class' => 'summernote',
                                'placeholder' => __d('panel', 'Body')
                            ]);
                            ?>
                        </div>
                        <div class="tab-pane fade" id="tab_uz" role="tabpanel">
                            <?php
                            echo $this->Form->control('_translations.uz.title', [
                                'label' => ['class' => 'sr-only'],
                                'class' => 'form-control input-lg form-control-lg rounded-0 border-top-0 border-left-0 border-right-0 px-0',
                                'placeholder' => __d('panel', 'Title')
                            ]);

                            echo $this->Form->control('_translations.uz.body', [
                                'label' => ['class' => 'sr-only'],
                                'class' => 'summernote',
                                'placeholder' => __d('panel', 'Body')
                            ]);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div id="panel-2" class="panel shadow-0" data-panel-close data-panel-collapsed data-panel-sortable data-panel-fullscreen data-panel-refresh data-panel-locked>
            <div class="panel-hdr">
                <h2><?= __d('panel', 'Publish mode') ?></h2>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="d-flex border-top pt-3">
                        <?php
                        echo $this->Form->postLink(
                            $this->Html->tag('i', '', ['class' => 'fal fa-trash']) . ' ' . __d('panel', 'Delete'),
                            $this->Url->build(['action' => 'delete', h($doc->id)]),
                            [
                                'class' => 'color-danger-900 mt-2 pr-2 mr-auto',
                                'data-title' => __d('panel', 'Are you sure you want to delete the page?'),
                                'data-message' => __d('panel', 'Deletion eliminates the possibility of data recovery.')
                            ]
                        );

                        echo $this->Form->submit(__d('panel', 'Save'));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->element('meta_tags', ['meta_tag' => $doc->meta_tag]) ?>
<?= $this->Form->end() ?>
