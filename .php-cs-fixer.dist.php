<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__ . '/src')
    ->in(__DIR__ . '/tests')
    ->exclude('vendor');

return (new PhpCsFixer\Config())
    ->setRules([
        '@PSR12' => true,
        'array_syntax' => ['syntax' => 'short'],
        'ordered_imports' => ['sort_algorithm' => 'alpha'],
        'no_unused_imports' => true,
        'no_whitespace_before_comma_in_array' => true,
        'trim_array_spaces' => true,
        'single_quote' => true,
        'no_trailing_whitespace' => true,
        'blank_line_after_namespace' => true,
        'blank_line_after_opening_tag' => true,
        'line_ending' => true,
        'no_extra_blank_lines' => true,
        'single_blank_line_at_eof' => true,
        'phpdoc_scalar' => true,
        'phpdoc_align' => ['align' => 'vertical'],
        'phpdoc_summary' => false,
        'phpdoc_indent' => true,
        'phpdoc_order' => true,
        'phpdoc_separation' => false,
        'phpdoc_trim_consecutive_blank_line_separation' => true,
    ])
    ->setRiskyAllowed(true)
    ->setFinder($finder);
