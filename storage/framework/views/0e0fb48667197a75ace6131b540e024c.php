<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'collapsible' => false,
    'description' => null,
    'label' => null,
    'start' => null,
    'title',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'collapsible' => false,
    'description' => null,
    'label' => null,
    'start' => null,
    'title',
]); ?>
<?php foreach (array_filter(([
    'collapsible' => false,
    'description' => null,
    'label' => null,
    'start' => null,
    'title',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div
    <?php if($collapsible): ?>
        x-on:click="toggleCollapseGroup(<?php echo \Illuminate\Support\Js::from($title)->toHtml() ?>)"
    <?php endif; ?>
    <?php echo e($attributes->class([
            'fi-ta-group-header flex w-full items-center gap-x-3 bg-gray-50 px-3 py-2 dark:bg-white/5',
            'cursor-pointer' => $collapsible,
        ])); ?>

>
    <?php echo e($start); ?>


    <div class="grid">
        <h4 class="text-sm font-medium text-gray-950 dark:text-white">
            <!--[if BLOCK]><![endif]--><?php if(filled($label)): ?>
                <?php echo e($label); ?>:
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

            <?php echo e($title); ?>

        </h4>

        <!--[if BLOCK]><![endif]--><?php if(filled($description)): ?>
            <p class="text-sm text-gray-500 dark:text-gray-400">
                <?php echo e($description); ?>

            </p>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>

    <!--[if BLOCK]><![endif]--><?php if($collapsible): ?>
        <?php if (isset($component)) { $__componentOriginalf0029cce6d19fd6d472097ff06a800a1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf0029cce6d19fd6d472097ff06a800a1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.icon-button','data' => ['color' => 'gray','icon' => 'heroicon-m-chevron-up','iconAlias' => 'tables::grouping.collapse-button','label' => filled($label) ? ($label . ': ' . $title) : $title,'size' => 'sm','xBind:ariaExpanded' => '! isGroupCollapsed(' . \Illuminate\Support\Js::from($title) . ')','xBind:class' => 'isGroupCollapsed(' . \Illuminate\Support\Js::from($title) . ') && \'-rotate-180\'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament::icon-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'gray','icon' => 'heroicon-m-chevron-up','icon-alias' => 'tables::grouping.collapse-button','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(filled($label) ? ($label . ': ' . $title) : $title),'size' => 'sm','x-bind:aria-expanded' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('! isGroupCollapsed(' . \Illuminate\Support\Js::from($title) . ')'),'x-bind:class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('isGroupCollapsed(' . \Illuminate\Support\Js::from($title) . ') && \'-rotate-180\'')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf0029cce6d19fd6d472097ff06a800a1)): ?>
<?php $attributes = $__attributesOriginalf0029cce6d19fd6d472097ff06a800a1; ?>
<?php unset($__attributesOriginalf0029cce6d19fd6d472097ff06a800a1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf0029cce6d19fd6d472097ff06a800a1)): ?>
<?php $component = $__componentOriginalf0029cce6d19fd6d472097ff06a800a1; ?>
<?php unset($__componentOriginalf0029cce6d19fd6d472097ff06a800a1); ?>
<?php endif; ?>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div>
<?php /**PATH /Users/macairm120201/Documents/brivent-main/vendor/filament/tables/src/../resources/views/components/group/header.blade.php ENDPATH**/ ?>