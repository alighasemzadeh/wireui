<?php

namespace WireUi\View\Components;

use Illuminate\Support\{Str, Stringable};

class Input extends FormComponent
{
    public bool $borderless;

    public bool $shadowless;

    public ?string $label;

    public ?string $hint;

    public ?string $cornerHint;

    public ?string $icon;

    public ?string $rightIcon;

    public ?string $prefix;

    public ?string $suffix;

    public ?string $prepend;

    public ?string $append;

    public function __construct(
        bool $borderless = false,
        bool $shadowless = false,
        ?string $label = null,
        ?string $hint = null,
        ?string $cornerHint = null,
        ?string $icon = null,
        ?string $rightIcon = null,
        ?string $prefix = null,
        ?string $suffix = null,
        ?string $prepend = null,
        ?string $append = null
    ) {
        $this->borderless = $borderless;
        $this->shadowless = $shadowless;
        $this->label      = $label;
        $this->hint       = $hint;
        $this->cornerHint = $cornerHint;
        $this->icon       = $icon;
        $this->rightIcon  = $rightIcon;
        $this->prefix     = $prefix;
        $this->suffix     = $suffix;
        $this->prepend    = $prepend;
        $this->append     = $append;
    }

    protected function getView(): string
    {
        return 'wireui::components.input';
    }

    public function getInputClasses(bool $hasError = false): string
    {
        $defaultClasses = $this->getDefaultClasses();

        if ($this->prefix || $this->icon) {
            $defaultClasses .= ' pl-8';
        }

        if ($hasError || $this->suffix || $this->rightIcon) {
            $defaultClasses .= ' pr-8';
        }

        if ($hasError) {
            return "{$this->getErrorClasses()} {$defaultClasses}";
        }

        return "{$this->getDefaultColorClasses()} {$defaultClasses}";
    }

    protected function getErrorClasses(): string
    {
        return Str::of('text-red-900 placeholder-red-300')
            ->unless($this->borderless, function(Stringable $stringable) {
                return $stringable->append(' border border-red-300 focus:ring-red-500 focus:border-red-500');
            });
    }

    protected function getDefaultColorClasses(): string
    {
        return Str::of('placeholder-gray-400')
            ->unless($this->borderless, function(Stringable $stringable) {
                return $stringable->append(' border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500');
            });
    }

    protected function getDefaultClasses(): string
    {
        return Str::of('block w-full sm:text-sm rounded-md transition ease-in-out duration-100 focus:outline-none')
            ->unless($this->shadowless, fn(Stringable $stringable) => $stringable->append(' shadow-sm'))
            ->when($this->borderless, function(Stringable $stringable) {
                return $stringable->append(' border-transparent focus:border-transparent focus:ring-transparent');
            });
    }
}
