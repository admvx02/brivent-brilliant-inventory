<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'actions' => false,
    'actionsPosition' => null,
    'columns',
    'extraHeadingColumn' => false,
    'groupColumn' => null,
    'groupsOnly' => false,
    'placeholderColumns' => true,
    'pluralModelLabel',
    'recordCheckboxPosition' => null,
    'records',
    'selectionEnabled' => false,
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'actions' => false,
    'actionsPosition' => null,
    'columns',
    'extraHeadingColumn' => false,
    'groupColumn' => null,
    'groupsOnly' => false,
    'placeholderColumns' => true,
    'pluralModelLabel',
    'recordCheckboxPosition' => null,
    'records',
    'selectionEnabled' => false,
]); ?>
<?php foreach (array_filter(([
    'actions' => false,
    'actionsPosition' => null,
    'columns',
    'extraHeadingColumn' => false,
    'groupColumn' => null,
    'groupsOnly' => false,
    'placeholderColumns' => true,
    'pluralModelLabel',
    'recordCheckboxPosition' => null,
    'records',
    'selectionEnabled' => false,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
    use Filament\Support\Enums\Alignment;
    use Filament\Tables\Columns\Column;
    use Filament\Tables\Enums\ActionsPosition;
    use Filament\Tables\Enums\RecordCheckboxPosition;

    if ($groupsOnly && $groupColumn) {
        $columns = collect($columns)
            ->reject(fn (Column $column): bool => $column->getName() === $groupColumn)
            ->all();
    }

    $hasPageSummary = (! $groupsOnly) && $records instanceof \Illuminate\Contracts\Pagination\Paginator && $records->hasPages();
?>

<!--[if BLOCK]><![endif]--><?php if($hasPageSummary): ?>
    <?php if (isset($component)) { $__componentOriginalb06932e913f01497313cb0ed448cecad = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb06932e913f01497313cb0ed448cecad = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-tables::components.row','data' => ['class' => 'fi-ta-summary-header-row bg-gray-50 dark:bg-white/5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament-tables::row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'fi-ta-summary-header-row bg-gray-50 dark:bg-white/5']); ?>
        <!--[if BLOCK]><![endif]--><?php if($placeholderColumns && $actions && in_array($actionsPosition, [ActionsPosition::BeforeCells, ActionsPosition::BeforeColumns])): ?>
            <td></td>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        <!--[if BLOCK]><![endif]--><?php if($placeholderColumns && $selectionEnabled && $recordCheckboxPosition === RecordCheckboxPosition::BeforeCells): ?>
            <td></td>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        <!--[if BLOCK]><![endif]--><?php if($extraHeadingColumn): ?>
            <?php if (isset($component)) { $__componentOriginal8238907c07bba916740783b1ce58f509 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8238907c07bba916740783b1ce58f509 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-tables::components.summary.header-cell','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament-tables::summary.header-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <?php echo e(__('filament-tables::table.summary.heading', ['label' => $pluralModelLabel])); ?>

             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8238907c07bba916740783b1ce58f509)): ?>
<?php $attributes = $__attributesOriginal8238907c07bba916740783b1ce58f509; ?>
<?php unset($__attributesOriginal8238907c07bba916740783b1ce58f509); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8238907c07bba916740783b1ce58f509)): ?>
<?php $component = $__componentOriginal8238907c07bba916740783b1ce58f509; ?>
<?php unset($__componentOriginal8238907c07bba916740783b1ce58f509); ?>
<?php endif; ?>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <!--[if BLOCK]><![endif]--><?php if($placeholderColumns || $column->hasSummary()): ?>
                <?php
                    $alignment = $column->getAlignment() ?? Alignment::Start;

                    if (! $alignment instanceof Alignment) {
                        $alignment = filled($alignment) ? (Alignment::tryFrom($alignment) ?? $alignment) : null;
                    }

                    $hasColumnHeaderLabel = (! $placeholderColumns) || $column->hasSummary();
                ?>

                <?php if (isset($component)) { $__componentOriginal8238907c07bba916740783b1ce58f509 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8238907c07bba916740783b1ce58f509 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-tables::components.summary.header-cell','data' => ['attributes' => 
                        \Filament\Support\prepare_inherited_attributes($column->getExtraHeaderAttributeBag())
                            ->class([
                                'whitespace-nowrap' => ! $column->isHeaderWrapped(),
                                'whitespace-normal' => $column->isHeaderWrapped(),
                                match ($alignment) {
                                    Alignment::Start => 'text-start',
                                    Alignment::Center => 'text-center',
                                    Alignment::End => 'text-end',
                                    Alignment::Left => 'text-left',
                                    Alignment::Right => 'text-right',
                                    Alignment::Justify, Alignment::Between => 'text-justify',
                                    default => $alignment,
                                } => (! ($loop->first && (! $extraHeadingColumn))) && $hasColumnHeaderLabel,
                            ])
                    ]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament-tables::summary.header-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(
                        \Filament\Support\prepare_inherited_attributes($column->getExtraHeaderAttributeBag())
                            ->class([
                                'whitespace-nowrap' => ! $column->isHeaderWrapped(),
                                'whitespace-normal' => $column->isHeaderWrapped(),
                                match ($alignment) {
                                    Alignment::Start => 'text-start',
                                    Alignment::Center => 'text-center',
                                    Alignment::End => 'text-end',
                                    Alignment::Left => 'text-left',
                                    Alignment::Right => 'text-right',
                                    Alignment::Justify, Alignment::Between => 'text-justify',
                                    default => $alignment,
                                } => (! ($loop->first && (! $extraHeadingColumn))) && $hasColumnHeaderLabel,
                            ])
                    )]); ?>
                    <!--[if BLOCK]><![endif]--><?php if($loop->first && (! $extraHeadingColumn)): ?>
                        <?php echo e(__('filament-tables::table.summary.heading', ['label' => $pluralModelLabel])); ?>

                    <?php elseif($hasColumnHeaderLabel): ?>
                        <?php echo e($column->getLabel()); ?>

                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8238907c07bba916740783b1ce58f509)): ?>
<?php $attributes = $__attributesOriginal8238907c07bba916740783b1ce58f509; ?>
<?php unset($__attributesOriginal8238907c07bba916740783b1ce58f509); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8238907c07bba916740783b1ce58f509)): ?>
<?php $component = $__componentOriginal8238907c07bba916740783b1ce58f509; ?>
<?php unset($__componentOriginal8238907c07bba916740783b1ce58f509); ?>
<?php endif; ?>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

        <!--[if BLOCK]><![endif]--><?php if($placeholderColumns && $actions && in_array($actionsPosition, [ActionsPosition::AfterColumns, ActionsPosition::AfterCells])): ?>
            <td></td>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        <!--[if BLOCK]><![endif]--><?php if($placeholderColumns && $selectionEnabled && $recordCheckboxPosition === RecordCheckboxPosition::AfterCells): ?>
            <td></td>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb06932e913f01497313cb0ed448cecad)): ?>
<?php $attributes = $__attributesOriginalb06932e913f01497313cb0ed448cecad; ?>
<?php unset($__attributesOriginalb06932e913f01497313cb0ed448cecad); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb06932e913f01497313cb0ed448cecad)): ?>
<?php $component = $__componentOriginalb06932e913f01497313cb0ed448cecad; ?>
<?php unset($__componentOriginalb06932e913f01497313cb0ed448cecad); ?>
<?php endif; ?>

    <?php
        $query = $this->getPageTableSummaryQuery();
        $selectedState = $this->getTableSummarySelectedState($query)[0] ?? [];
    ?>

    <?php if (isset($component)) { $__componentOriginala3ad14087ab6b316cf1e1d1a634acbeb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala3ad14087ab6b316cf1e1d1a634acbeb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-tables::components.summary.row','data' => ['actions' => $actions,'actionsPosition' => $actionsPosition,'columns' => $columns,'extraHeadingColumn' => $extraHeadingColumn,'heading' => __('filament-tables::table.summary.subheadings.page', ['label' => $pluralModelLabel]),'placeholderColumns' => $placeholderColumns,'query' => $query,'recordCheckboxPosition' => $recordCheckboxPosition,'selectedState' => $selectedState,'selectionEnabled' => $selectionEnabled]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament-tables::summary.row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['actions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($actions),'actions-position' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($actionsPosition),'columns' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($columns),'extra-heading-column' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($extraHeadingColumn),'heading' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('filament-tables::table.summary.subheadings.page', ['label' => $pluralModelLabel])),'placeholder-columns' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($placeholderColumns),'query' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($query),'record-checkbox-position' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($recordCheckboxPosition),'selected-state' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($selectedState),'selection-enabled' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($selectionEnabled)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala3ad14087ab6b316cf1e1d1a634acbeb)): ?>
<?php $attributes = $__attributesOriginala3ad14087ab6b316cf1e1d1a634acbeb; ?>
<?php unset($__attributesOriginala3ad14087ab6b316cf1e1d1a634acbeb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala3ad14087ab6b316cf1e1d1a634acbeb)): ?>
<?php $component = $__componentOriginala3ad14087ab6b316cf1e1d1a634acbeb; ?>
<?php unset($__componentOriginala3ad14087ab6b316cf1e1d1a634acbeb); ?>
<?php endif; ?>
<?php endif; ?><!--[if ENDBLOCK]><![endif]-->

<?php
    $query = $this->getAllTableSummaryQuery();
    $selectedState = $this->getTableSummarySelectedState($query)[0] ?? [];
?>

<?php if (isset($component)) { $__componentOriginala3ad14087ab6b316cf1e1d1a634acbeb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala3ad14087ab6b316cf1e1d1a634acbeb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-tables::components.summary.row','data' => ['actions' => $actions,'actionsPosition' => $actionsPosition,'columns' => $columns,'extraHeadingColumn' => $extraHeadingColumn,'groupsOnly' => $groupsOnly,'heading' => __(($hasPageSummary ? 'filament-tables::table.summary.subheadings.all' : 'filament-tables::table.summary.heading'), ['label' => $pluralModelLabel]),'placeholderColumns' => $placeholderColumns,'query' => $query,'recordCheckboxPosition' => $recordCheckboxPosition,'selectedState' => $selectedState,'selectionEnabled' => $selectionEnabled,'class' => \Illuminate\Support\Arr::toCssClasses([
        'bg-gray-50 dark:bg-white/5' => ! $hasPageSummary,
    ])]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament-tables::summary.row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['actions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($actions),'actions-position' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($actionsPosition),'columns' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($columns),'extra-heading-column' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($extraHeadingColumn),'groups-only' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($groupsOnly),'heading' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__(($hasPageSummary ? 'filament-tables::table.summary.subheadings.all' : 'filament-tables::table.summary.heading'), ['label' => $pluralModelLabel])),'placeholder-columns' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($placeholderColumns),'query' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($query),'record-checkbox-position' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($recordCheckboxPosition),'selected-state' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($selectedState),'selection-enabled' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($selectionEnabled),'class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(\Illuminate\Support\Arr::toCssClasses([
        'bg-gray-50 dark:bg-white/5' => ! $hasPageSummary,
    ]))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala3ad14087ab6b316cf1e1d1a634acbeb)): ?>
<?php $attributes = $__attributesOriginala3ad14087ab6b316cf1e1d1a634acbeb; ?>
<?php unset($__attributesOriginala3ad14087ab6b316cf1e1d1a634acbeb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala3ad14087ab6b316cf1e1d1a634acbeb)): ?>
<?php $component = $__componentOriginala3ad14087ab6b316cf1e1d1a634acbeb; ?>
<?php unset($__componentOriginala3ad14087ab6b316cf1e1d1a634acbeb); ?>
<?php endif; ?>
<?php /**PATH /Users/macairm120201/Documents/brivent-main/vendor/filament/tables/src/../resources/views/components/summary/index.blade.php ENDPATH**/ ?>