<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'prefix' => null,
    'suffix' => null,
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'prefix' => null,
    'suffix' => null,
]); ?>
<?php foreach (array_filter(([
    'prefix' => null,
    'suffix' => null,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<dt
    <?php echo e($attributes->class(['fi-in-entry-wrp-label inline-flex items-center gap-x-3'])); ?>

>
    <?php echo e($prefix); ?>


    <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
        <?php echo e($slot); ?>

    </span>

    <?php echo e($suffix); ?>

</dt>
<?php /**PATH /Users/macairm120201/Documents/brivent-main/vendor/filament/infolists/src/../resources/views/components/entry-wrapper/label.blade.php ENDPATH**/ ?>