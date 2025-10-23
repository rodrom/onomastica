# Onomastica: Spanish / Multilingual Name Normalizer

> **Lightweight, framework/agnostic PHP Library to normalize personal names** following Spanish, Catalan, French and other languages conventions (apostrophes, connectors like `de`, `d’`, `del`, `y`, `i`, etc.). Designed to be suitable for use in any PHP project.

---

## Features

- Trim and collapse whitespace.
- Correct casing (taking into account multibyte characters.)
- Handle language-specific particles and connectors (`de`, `d’`, `del`, `y`, `von`, etc.)
- Normalize different apostrophe characters and fix spacing around them.

---

## Installation

Require via Composer:

```bash
composer require rodrom/onomastica
```

---

## Quick Usage

```php
use Rodrom\Onomastica\NameNormalizer;

$normalizer = new NameNormalizer();
echo $normalizer->normalize('   Ignacio   DE   loYOla ');    // "Ignacio de Loyola"
echo $normalizer->normalize('IÑIGO López DE OÑAZ Y Loyola'); // "Iñigo López de Oñaz y Loyola"
echo $normalizer->normalize('María DE LAS Mercedes GARCÍA Y García');  // "José Antonio García y García"
echo $normalizer->normalize("JAUME D'ARAGó-URGELL I MONTFERRAT"); // "Jaume d’Aragó-Urgell i Montferrat"
```

---

## Changelog

[Changelog](CHANGELOG.md)

## License

[MIT License](LICENSE)

Copyright © 2025 rodrom